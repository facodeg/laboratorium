
@extends('layouts.app')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-1 mb-1">
            <div class="col-12">
                <div>
                    @include('layouts.alert')
                </div>
            </div>
        </div>
    </div>

    <!-- Basic Layout -->

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Keluar Barang</h5>
                </div>
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf


                    <div class="card-body">


                        <div class="mb-3">
                            <label class="form-label">Barang</label>
                            <div class="select-group select-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-package"></i>
                                        <select  data-live-search="true" data-style="btn-default" class="selectpicker w-100 @error('id_barang') is-invalid @enderror"
                                        name="id_barang">
                                        <option value="">Pilih Barang</option>

                                        @foreach ($barangs as $barang)
                                        {{-- Mengambil stok dari tabel tb_stock --}}
                                        @php
                                            $stock = App\Models\Stock::where('id_barang', $barang->id)->first();
                                        @endphp
                                        {{-- Menampilkan opsi dropdown dengan informasi stok --}}
                                        <option value="{{ $barang->id }}">{{ $barang->name }} - {{ $barang->spesifikasi }} [{{ $barang->category->name }}] @if($stock) (Stok: {{ $stock->stock }}  {{ $barang->satuan->name }}) @endif</option>
                                         @endforeach

                                    </select>
                                    @error('id_barang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </span>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-stats-up"></i></span>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    name="jumlah">
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">

                <div class="card">
                    <div class="card-header border-bottom">

                        <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                            <div class="col-md-12">
                                <form method="GET" action="{{ route('transaksi.create') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="name">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-datatable table-responsive pt-3">
                        <table class="dt-complex-header table table-bordered " id="table-barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Spesifikasi</th>
                                    <th>Satuan</th>
                                    <th>Category</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi->barang->name }}</td>
                                    <td>{{ $transaksi->barang->spesifikasi }}</td>
                                    <td>{{ $transaksi->barang->satuan->name }}</td>
                                    <td>{{ $transaksi->barang->category->name }}</td>
                                    <td>{{ $transaksi->jumlah }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                {{-- <a class="dropdown-item" href="{{ route('barang.edit', $transaksi->id) }}">
                                                    <i class="ti ti-pencil me-1"></i> Edit
                                                </a> --}}
                                                <form action="{{ route('transaksi.hapus', $transaksi->id) }}" method="POST" class="ml-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="ti ti-trash me-1"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right">
                        {{ $transaksis->withQueryString()->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Proses Data Keluar Barang</h5>
                </div>

                <form action="{{ route('transaksi.proses') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nomor Pengeluaran</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-credit-card"></i></span>
                                <input type="text"
                                    class="form-control @error('no_pengeluaran') is-invalid @enderror"
                                    name="no_pengeluaran" value="{{ $no_pengeluaran }}">
                                @error('no_pengeluaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Keluar</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-calendar"></i></span>
                                <input type="date"
                                    class="form-control @error('tanggal_keluar') is-invalid @enderror"
                                    name="tanggal_keluar">
                                @error('tanggal_keluar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    </div>
@endsection




