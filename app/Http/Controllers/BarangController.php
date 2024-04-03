<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Satuan;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barangs = Barang::query()
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->with(['category', 'satuan'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.barang.index', compact('barangs'));
    }

    public function create()
    {
        $satuans = Satuan::all();
        $categories = Category::all();
        return view('pages.barang.create', compact('satuans', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'spesifikasi' => 'nullable',
            'id_satuan' => 'required',
            'id_category' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);



        $barang = new Barang();
        $barang->name = $request->name;
        $barang->spesifikasi = $request->spesifikasi;
        $barang->id_satuan = $request->id_satuan;
        $barang->id_category = $request->id_category;

        if ($request->hasFile('foto')) {
            $filename = $request->foto->getClientOriginalName();
            $barang->foto = $request->foto->storeAs('photos', $filename, 'public');
        }

        $barang->save();

         // Simpan data stock dengan nilai stock 0
        $stock = new Stock();
        $stock->id_barang = $barang->id;
        $stock->stock = 0;
        $stock->save();

        return redirect()->route('barang.create')->with('success', 'Barang successfully created');
    }



    public function show($id)
    {
        $barang = Barang::find($id);
        return view('pages.barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        $satuans = Satuan::all();
        $categories = Category::all();
        return view('pages.barang.edit', compact('barang', 'satuans', 'categories'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'name' => 'required',
            'spesifikasi' => 'nullable',
            'id_satuan' => 'required',
            'id_category' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $barang->name = $request->name;
        $barang->spesifikasi = $request->spesifikasi;
        $barang->id_satuan = $request->id_satuan;
        $barang->id_category = $request->id_category;

        if ($request->hasFile('foto')) {
            $filename = $request->foto->getClientOriginalName();
            $barang->foto = $request->foto->storeAs('photos', $filename, 'public');
        }

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang successfully updated');
    }

    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $stock = Stock::where('id_barang', $id)->first();

            // Hapus data stock jika ditemukan
            if ($stock) {
                $stock->delete();
            }

            if ($barang->foto && Storage::disk('public')->exists($barang->foto)) {
                // Hapus foto dari penyimpanan
                Storage::disk('public')->delete($barang->foto);
            }

            $barang->delete();

            return redirect()->route('barang.index')->with('success', 'Barang successfully deleted');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')->with('success', 'Data cannot be deleted. It is related to other records.');
        }
    }
}
