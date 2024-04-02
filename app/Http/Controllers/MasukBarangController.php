<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\MasukBarang;
use App\Models\Category;
use App\Models\Satuan;
use App\Models\Stock;
use Illuminate\Http\Request;

class MasukBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $masukbarangs = MasukBarang::query()
            ->when($request->input('name'), function ($query, $name) {
                return $query->whereHas('barang', function ($subQuery) use ($name) {
                    $subQuery->where('name', 'like', '%' . $name . '%');
                });
            })
            ->whereHas('barang', function ($query) {
                $query->where('status', 'sukses');
            })
            ->with(['barang', 'barang.category', 'barang.satuan'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.masukbarang.index', compact('masukbarangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


        $nextInvoiceNumber = MasukBarang::max('id') + 1;

        // Format nomor faktur dengan padding nol di depan
        $nomorFaktur = str_pad($nextInvoiceNumber, 7, '0', STR_PAD_LEFT) . 'LAB-IN';


        $masukbarangs = MasukBarang::query()
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
        return view('pages.masukbarang.create', compact('barangs','masukbarangs' ,'nomorFaktur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'id_barang' => 'required',
            'jumlah_masuk' => 'required|numeric',
            'kondisi' => 'required',
            'label' => 'required',
        ]);

        // Membuat atau menemukan record Stock yang sesuai dengan id_barang
        $stock = Stock::firstOrNew(['id_barang' => $validatedData['id_barang']]);

        // Menambahkan jumlah baru ke stock yang ada
        $stock->stock += $validatedData['jumlah_masuk'];

        // Simpan perubahan ke dalam database
        $stock->save();

        // Ambil id_user dari user yang sedang login
        $id_user = auth()->user()->id;

        MasukBarang::create([
            'id_barang' => $validatedData['id_barang'],
            'jumlah_masuk' => $validatedData['jumlah_masuk'],
            'jumlah_sisa' => $stock->stock,
            'kondisi' => $validatedData['kondisi'],
            'label' => $validatedData['label'],
            'id_user' => $id_user, // Gunakan id_user dari user yang sedang login
        ]);

        return redirect()->route('masukbarang.create')->with('success', 'Data masuk barang berhasil disimpan.');
    }


    public function hapus(string $id)
    {
        // Cari data MasukBarang berdasarkan ID
        $masukBarang = MasukBarang::findOrFail($id);

        // Temukan atau buat record Stock yang sesuai dengan id_barang
        $stock = Stock::firstOrNew(['id_barang' => $masukBarang->id_barang]);

        // Tambahkan kembali jumlah yang dihapus dari stok yang ada
        $stock->stock -= $masukBarang->jumlah_masuk;

        // Simpan perubahan ke dalam database
        $stock->save();

        // Hapus data MasukBarang
        $masukBarang->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('masukbarang.create')->with('success', 'Data masuk barang berhasil dihapus.');
    }

    public function proses(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'no_faktur' => 'required',
            'tanggal_masuk' => 'required',
        ]);




        $updated = MasukBarang::whereNull('tanggal_masuk')
                            ->where('status', 'pending')
                            ->update([
                                'status' => 'sukses',
                                'no_faktur' => $request->no_faktur,
                                'tanggal_masuk' => $request->tanggal_masuk,
                            ]);

        if ($updated) {
            return redirect()->route('masukbarang.index')->with('success', 'Data masuk barang berhasil disimpan.');
        } else {
            return redirect()->route('masukbarang.index')->with('error', 'Tidak ada data yang sesuai dengan kondisi yang diberikan.');
        }
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
        $masukBarang = MasukBarang::findOrFail($id);

        // Temukan atau buat record Stock yang sesuai dengan id_barang
        $stock = Stock::firstOrNew(['id_barang' => $masukBarang->id_barang]);

        // Kurangi stock yang ada dengan jumlah yang dihapus
        $stock->stock -= $masukBarang->jumlah_masuk;


        // Simpan perubahan ke dalam database
        $stock->save();

        // Hapus data MasukBarang
        $masukBarang->delete();


        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('masukbarang.index')->with('success', 'Data masuk barang berhasil dihapus.');
    }
}
