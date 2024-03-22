@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

        <div class="col-md-12">
            <div>
                @include('layouts.alert')
            </div>
        </div>

</div>

<!-- Barang List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <h5 class="card-title mb-3 d-flex justify-content-between align-items-center">
            Search Filter
            <a href="{{ route('masukbarang.create') }}" class="btn btn-primary">Tambah</a>
        </h5>
        <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
            <div class="col-md-12">
                <form method="GET" action="{{ route('masukbarang.index') }}">
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
                    <th>Tanggal Masuk</th>
                    <th>Jumlah</th>
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
                    <td>{{ $masukbarang->tanggal_masuk }}</td>
                    <td>{{ $masukbarang->jumlah }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('masukbarang.edit', $masukbarang->id) }}">
                                    <i class="ti ti-pencil me-1"></i> Edit
                                </a>
                                <form action="{{ route('masukbarang.destroy', $masukbarang->id) }}" method="POST" class="ml-2">
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
        <div style="margin-bottom: 20px;"></div>
    </div>
    <div class="float-right">
        {{ $masukbarangs->withQueryString()->links() }}
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $("#table-barang").DataTable();
    });
</script>

@endsection
