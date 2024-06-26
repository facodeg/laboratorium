
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
                    <h5 class="mb-0">Data Masuk Barang</h5>
                </div>
                <form action="{{ route('masukbarang.store') }}" method="POST">
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
                                            <option value="{{ $barang->id }}">{{ $barang->name }} - {{ $barang->spesifikasi }} ({{ $barang->satuan->name }}) [{{ $barang->category->name }}]</option>
                                        @endforeach
                                    </select>
                                    @error('id_barang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </span>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kondisi</label>
                            <div class=" mb-2">
                                <div class="col-xl-12 p-2">
                                    <label class="switch switch-success">
                                        <input type="radio" class="switch-input" name="kondisi" value="1" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                        <span class="switch-label">Baik</span>
                                    </label>

                                    <label class="switch switch-danger">
                                        <input type="radio" class="switch-input" name="kondisi" value="2">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                        <span class="switch-label">Tidak Baik</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pemasangan Label</label>
                            <div class=" mb-2">
                                <div class="col-xl-12 p-2">
                                    <label class="switch switch-success">
                                        <input type="radio" class="switch-input" name="label" value="1" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                        <span class="switch-label">Terpasang</span>
                                    </label>

                                    <label class="switch switch-danger">
                                        <input type="radio" class="switch-input" name="label" value="2">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                        <span class="switch-label">Tidak Terpasang</span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Jumlah Masuk</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-stats-up"></i></span>
                                <input type="number" class="form-control @error('jumlah_masuk') is-invalid @enderror"
                                    name="jumlah_masuk">
                                @error('jumlah_masuk')
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
                                <form method="GET" action="{{ route('masukbarang.create') }}">
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
                                    <th>Kondisi</th>
                                    <th>Label</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masukbarangs as $masukbarang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $masukbarang->barang->name }}</td>
                                    <td>{{ $masukbarang->barang->spesifikasi }}</td>
                                    <td>{{ $masukbarang->barang->satuan->name }}</td>
                                    <td>{{ $masukbarang->barang->category->name }}</td>
                                    <td>{{ $masukbarang->kondisi }}</td>
                                    <td>{{ $masukbarang->label }}</td>
                                    <td>{{ $masukbarang->jumlah_masuk }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                {{-- <a class="dropdown-item" href="{{ route('barang.edit', $masukbarang->id) }}">
                                                    <i class="ti ti-pencil me-1"></i> Edit
                                                </a> --}}
                                                <form action="{{ route('masukbarang.hapus', $masukbarang->id) }}" method="POST" class="ml-2">
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
                        {{ $masukbarangs->withQueryString()->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Proses Data Masuk Barang</h5>
                </div>

                <form action="{{ route('masukbarang.proses') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nomor Faktur</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-credit-card"></i></span>
                                <input type="text"
                                    class="form-control @error('no_faktur') is-invalid @enderror"
                                    name="no_faktur" value="{{ $nomorFaktur }}">
                                @error('no_faktur')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Masuk</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-calendar"></i></span>
                                <input type="date"
                                    class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                    name="tanggal_masuk">
                                @error('tanggal_masuk')
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




