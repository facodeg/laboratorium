<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Stock;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transaksis = Transaksi::query()
        ->when($request->input('name'), function ($query, $name) {
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

    return view('pages.transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $nextInvoiceNumber = Transaksi::max('id') + 1;

        // Format nomor faktur dengan padding nol di depan
        $no_pengeluaran = str_pad($nextInvoiceNumber, 7, '0', STR_PAD_LEFT) . 'LAB-OUT';

        $transaksis = Transaksi::query()
            ->when($request->input('name'), function ($query, $name) {
                return $query->whereHas('barang', function ($subQuery) use ($name) {
                    $subQuery->where('name', 'like', '%' . $name . '%');
                });
            })
            ->whereHas('barang', function ($query) {
                $query->where('status', 'pending');
            })
            ->with(['barang', 'barang.category', 'barang.satuan'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        $barangs = Barang::all();

        return view('pages.transaksi.create', compact('barangs', 'transaksis', 'no_pengeluaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required',
            'jumlah_keluar' => 'required|numeric',
        ]);

        // Mencari atau membuat record Stock yang sesuai dengan id_barang
        $stock = Stock::firstOrNew(['id_barang' => $validatedData['id_barang']]);

        // Mengecek apakah stok mencukupi
        if ($stock->stock < $validatedData['jumlah_keluar']) {
            return redirect()->route('transaksi.create')->with('error', 'Data stock tidak mencukupi');
        } else {
            // Mengurangi stok dari jumlah_keluar yang dipesan


            $stock->stock -= $validatedData['jumlah_keluar'];

            $id_user = auth()->user()->id;

            // Membuat record transaksi
            Transaksi::create([
                'id_barang' => $validatedData['id_barang'],
                'jumlah_keluar' => $validatedData['jumlah_keluar'],
                'jumlah_sisa' => $stock->stock,
                'id_user' => $id_user,
            ]);
            // Menyimpan perubahan ke dalam database
            $stock->save();


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

        // Tambahkan kembali jumlah_keluar yang dihapus dari stok yang ada
        $stock->stock += $masukBarang->jumlah_keluar;

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

        // Tambahkan kembali jumlah_keluar yang dihapus dari stok yang ada
        $stock->stock += $masukBarang->jumlah_keluar;

        // Simpan perubahan ke dalam database
        $stock->save();

        // Hapus data MasukBarang
        $masukBarang->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Data masuk barang berhasil dihapus.');
    }

}
