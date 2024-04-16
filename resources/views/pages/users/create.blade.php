@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create User</h5>
                    </div>

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-user"></i></span>
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
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-email2" class="input-group-text"><i
                                            class="ti ti-mail"></i></span>
                                    <input type="email"
                                        class="form-control @error('email')
                                is-invalid
                            @enderror"
                                        name="email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label"> Password</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-password2" class="input-group-text"><i
                                            class="ti ti-lock"></i></span>
                                    <input type="password"
                                        class="form-control @error('password')
                                is-invalid
                            @enderror"
                                        name="password">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i
                                            class="ti ti-phone"></i></span>
                                    <input type="number" class="form-control" name="phone">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md mb-md-0 mb-2">
                                    <div class="form-check custom-option custom-option-icon">
                                        <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                            <span class="custom-option-body">
                                                <i class="ti ti-rocket"></i>
                                                <span class="custom-option-title">Admin</span>

                                            </span>
                                            <input name="role" class="form-check-input" type="radio" value="admin"
                                                id="customRadioIcon1" checked />
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md mb-md-0 mb-2">
                                    <div class="form-check custom-option custom-option-icon">
                                        <label class="form-check-label custom-option-content" for="customRadioIcon2">
                                            <span class="custom-option-body">
                                                <i class="ti ti-star"></i>
                                                <span class="custom-option-title">Doctor</span>

                                            </span>
                                            <input name="role" class="form-check-input" type="radio" value="doctor"
                                                id="customRadioIcon2" />
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md mb-md-0 mb-2">
                                    <div class="form-check custom-option custom-option-icon">
                                        <label class="form-check-label custom-option-content" for="customRadioIcon3">
                                            <span class="custom-option-body">
                                                <i class="ti ti-briefcase"></i>
                                                <span class="custom-option-title">User</span>

                                            </span>
                                            <input name="role" class="form-check-input" type="radio" value="user"
                                                id="customRadioIcon3" />
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-check custom-option custom-option-icon">
                                        <label class="form-check-label custom-option-content" for="customRadioIcon4">
                                            <span class="custom-option-body">
                                                <i class="ti ti-briefcase"></i>
                                                <span class="custom-option-title">Perawat</span>

                                            </span>
                                            <input name="role" class="form-check-input" type="radio" value="perawat"
                                                id="customRadioIcon4" />
                                        </label>
                                    </div>
                                </div>
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
