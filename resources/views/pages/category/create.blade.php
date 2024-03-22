@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

    <div class="row g-4 mb-4">
        <div class="col-12">
            <div >
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
                    <h5 class="mb-0">Create Satuan</h5>
                </div>

                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf

                        <div class="card-body">

                        <div class="mb-3">
                                <label class="form-label" >Nama Satuan</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"
                                      ><i class="ti ti-user"></i
                                    ></span>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
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
