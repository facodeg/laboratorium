<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuanController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $satuans = DB::table('tb_satuan')
            ->when($request->input('nama'), function ($query, $nama) {
                return $query->where('name', 'like', '%' . $nama . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.satuan.index', compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.satuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',

        ]);



        $satuan = new Satuan;
        $satuan->fill($validatedData);
        $satuan->save();

        return redirect()->route('satuan.create')->with('success', 'User successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuan.show', compact('satuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('pages.satuan.edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $satuan = Satuan::findOrFail($id);
        $satuan->fill($validatedData);
        $satuan->save();

        return redirect()->route('satuan.index')->with('success', 'User successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'User successfully deleted');
    }
}
