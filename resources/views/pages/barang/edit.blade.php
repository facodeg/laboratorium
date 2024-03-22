@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Barang</h5>
                </div>

                <form action="{{ route('barang.update', $barang->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-package"></i></span>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="name" value="{{ $barang->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Spesifikasi</label>
                            <textarea class="form-control @error('spesifikasi') is-invalid @enderror" name="spesifikasi" rows="3">{{ $barang->spesifikasi }}</textarea>
                            @error('spesifikasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Id Satuan -->
                        <div class="mb-3">
                            <label class="form-label">Satuan</label>
                            <select class="form-select @error('id_satuan') is-invalid @enderror" name="id_satuan">
                                <option value="" disabled>Select Satuan</option>
                                @foreach($satuans as $satuan)
                                    <option value="{{ $satuan->id }}" {{ $barang->id_satuan == $satuan->id ? 'selected' : '' }}>{{ $satuan->name }}</option>
                                @endforeach
                            </select>
                            @error('id_satuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Id Category -->
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select @error('id_category') is-invalid @enderror" name="id_category">
                                <option value="" disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $barang->id_category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('id_category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
