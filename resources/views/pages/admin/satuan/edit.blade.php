@extends('layouts.app')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Edit Satuan</h5>
                                </div>

                                <form action="{{ route('satuan.update', $satuan->id) }}" enctype="multipart/form-data" method="POST" class="dropzone needsclick" id="dropzone-basic">
                                    @csrf
                                    @method('PUT')

                                    <div class="card-body">

                                        <div class="mb-3">
                                            <label class="form-label">Nama Satuan</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                        class="ti ti-user"></i></span>
                                                <input type="text"
                                                    class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                                    name="name" value="{{ $satuan->name }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>



                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Update</button>
                            </div>
                            </form>
                            <div class="content-backdrop fade"></div>
                            <div class="layout-overlay layout-menu-toggle"></div>
                            <div class="drag-target"></div>
                        </div>
                    </div>
                </div>
                </div>
            @endsection
