<?php

namespace App\Http\Controllers;

use App\Models\MasukBarang;
use App\Models\Stock;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        ->paginate(5);

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
        ->paginate(5);


        $stocks = Stock::query()
            ->when($request->input('name'), function ($query, $name) {
                return $query->whereHas('barang', function ($subQuery) use ($name) {
                    $subQuery->where('name', 'like', '%' . $name . '%');
                });
            })

            ->with(['barang', 'barang.category', 'barang.satuan'])
            ->orderBy('id', 'desc')
            ->paginate(5);

    return view('pages.dashboard.index', compact('masukbarangs','transaksis','stocks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
