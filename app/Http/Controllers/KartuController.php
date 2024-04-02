<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kartu;
use App\Models\Stock;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class KartuController extends Controller
{
    //

    public function index(Request $request)
    {
        $transaksis = Transaksi::query()
        ->when($request->input('name1'), function ($query, $name) {
            return $query->whereHas('barang', function ($subQuery) use ($name) {
                $subQuery->where('name', 'like', '%' . $name . '%');
            });
        })
        ->whereHas('barang', function ($query) {
            $query->where('status', 'sukses');
        })
        ->with(['barang', 'barang.category', 'barang.satuan','stock'])
        ->orderBy('id', 'desc')
        ->paginate(10);

        $barangHistories = Kartu::query()
        ->when($request->input('name'), function ($query, $name) {
            $query->where('name', 'like', '%' . $name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);

    return view('pages.transaksi.index', compact('transaksis', 'barangHistories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


        // Format nomor faktur dengan padding nol di depan


        $transaksis = Transaksi::query()
            ->when($request->input('name1'), function ($query, $name) {
                return $query->whereHas('barang', function ($subQuery) use ($name) {
                    $subQuery->where('name', 'like', '%' . $name . '%');
                });
            })
            ->whereHas('barang', function ($query) {
                $query->where('status', 'pending');
            })
            ->with(['barang', 'barang.category', 'barang.satuan'])
            ->orderBy('id', 'desc');

        $barangs = Barang::all();

        $barangHistories = Kartu::query()
        ->when($request->input('tanggal_awal') && $request->input('tanggal_akhir'), function ($query) use ($request) {
            $query->whereBetween('tanggal', [$request->input('tanggal_awal'), $request->input('tanggal_akhir')]);
        })
        ->when($request->input('id_barang'), function ($query) use ($request) {
            $query->where('id_barang', $request->input('id_barang'));
        })
        ->orderBy('id', 'desc');

    // Jika 'tanggal_awal', 'tanggal_akhir', dan 'id_barang' tidak kosong, maka tidak menggunakan paginate
    if ($request->input('tanggal_awal') && $request->input('tanggal_akhir') && $request->input('id_barang')) {
        $barangHistories = $barangHistories->paginate(0);
    } else {
        $barangHistories = $barangHistories->paginate(5);
    }

    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');



        return view('pages.kartu.create', compact('barangs', 'transaksis' ,'barangHistories','tanggalAwal', 'tanggalAkhir'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        // Mencari atau membuat record Stock yang sesuai dengan id_barang
        $stock = Stock::firstOrNew(['id_barang' => $validatedData['id_barang']]);

        // Mengecek apakah stok mencukupi
        if ($stock->stock < $validatedData['jumlah']) {
            return redirect()->route('transaksi.create')->with('error', 'Data stock tidak mencukupi');
        } else {
            // Mengurangi stok dari jumlah yang dipesan
            $stock->stock -= $validatedData['jumlah'];

            // Menyimpan perubahan ke dalam database
            $stock->save();

            // Membuat record transaksi
            Transaksi::create([
                'id_barang' => $validatedData['id_barang'],
                'jumlah' => $validatedData['jumlah'],
            ]);

            return redirect()->route('transaksi.create')->with('success', 'Data masuk barang berhasil disimpan.');
        }
    }




    public function proses(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'no_pengeluaran' => 'required',
            'tanggal_keluar' => 'required',
        ]);




        $updated = Transaksi::whereNull('tanggal_keluar')
                            ->where('status', 'pending')
                            ->update([
                                'status' => 'sukses',
                                'no_pengeluaran' => $request->no_pengeluaran,
                                'tanggal_keluar' => $request->tanggal_keluar,
                            ]);

        if ($updated) {
            return redirect()->route('transaksi.index')->with('success', 'Data masuk barang berhasil disimpan.');
        } else {
            return redirect()->route('transaksi.index')->with('error', 'Tidak ada data yang sesuai dengan kondisi yang diberikan.');
        }
    }


    public function hapus(string $id)
    {
        // Cari data MasukBarang berdasarkan ID
        $masukBarang = Transaksi::findOrFail($id);

        // Temukan atau buat record Stock yang sesuai dengan id_barang
        $stock = Stock::firstOrNew(['id_barang' => $masukBarang->id_barang]);

        // Tambahkan kembali jumlah yang dihapus dari stok yang ada
        $stock->stock += $masukBarang->jumlah;

        // Simpan perubahan ke dalam database
        $stock->save();

        // Hapus data MasukBarang
        $masukBarang->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('transaksi.create')->with('success', 'Data masuk barang berhasil dihapus.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data MasukBarang berdasarkan ID
        $masukBarang = Transaksi::findOrFail($id);

        // Temukan atau buat record Stock yang sesuai dengan id_barang
        $stock = Stock::firstOrNew(['id_barang' => $masukBarang->id_barang]);

        // Tambahkan kembali jumlah yang dihapus dari stok yang ada
        $stock->stock += $masukBarang->jumlah;

        // Simpan perubahan ke dalam database
        $stock->save();

        // Hapus data MasukBarang
        $masukBarang->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Data masuk barang berhasil dihapus.');
    }

}
