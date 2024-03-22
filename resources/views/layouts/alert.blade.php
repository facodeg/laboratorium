@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible d-flex align-items-baseline" role="alert">
        <span class="alert-icon alert-icon-lg text-success me-2">
            <i class="ti ti-check ti-sm"></i>
        </span>
        <div class="d-flex flex-column ps-1">
            <p class="mb-0">
                {{ $message }}
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if ($error = Session::get('error'))
    <div class="alert alert-danger alert-dismissible d-flex align-items-baseline" role="alert">
        <span class="alert-icon alert-icon-lg text-danger me-2">
            <i class="ti ti-close ti-sm"></i>
        </span>
        <div class="d-flex flex-column ps-1">
            <p class="mb-0">
                {{ $error }}
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
