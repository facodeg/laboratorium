@extends('layouts.app')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div >
                @include('layouts.alert')
            </div>
        </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Admin</span>
                <div class="d-flex align-items-center my-1">
                  <h4 class="mb-0 me-2">{{ $adminCount }}</h4>
                  <span class="text-success">{{ $adminPercentage }}</span>
                </div>
                <span>Total</span>
              </div>
              <span class="badge bg-label-primary rounded p-2">
                <i class="ti ti-user ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Dockter</span>
                <div class="d-flex align-items-center my-1">
                  <h4 class="mb-0 me-2">{{ $doctorCount }}</h4>
                  <span class="text-success">{{ $doctorPercentage }}</span>
                </div>
                <span>Total </span>
              </div>
              <span class="badge bg-label-danger rounded p-2">
                <i class="ti ti-user-plus ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Users</span>
                <div class="d-flex align-items-center my-1">
                  <h4 class="mb-0 me-2">{{ $userCount }}</h4>
                  <span class="text-danger">{{ $userPercentage }}</span>
                </div>
                <span>Total</span>
              </div>
              <span class="badge bg-label-success rounded p-2">
                <i class="ti ti-user-check ti-md"></i>
              </span>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3 d-flex justify-content-between align-items-center">
                Search Filter
                <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah</a>
            </h5>
            <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                <div class="col-md-12">
                    <form method="GET" action="{{ route('users.index') }}">
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
                <table class="dt-complex-header table table-bordered " id="table-user">
                    <thead>
                        <tr >
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Roall</th>
                            <th>Created At</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    @if($user->file)
                                        <img src="{{ asset('storage/'.$user->file) }}" alt="User Image" class="h-auto rounded-circle" style="width: 30px; height: 20px;">
                                    @else
                                        <i class="ti ti-camera ti-md"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                          <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"
                                            ><i class="ti ti-pencil me-1"></i> Edit</a
                                          >
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="ml-2">
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
                {{ $users->withQueryString()->links() }}
            </div>
        </div>
    </div>

  <script type="text/javascript">
    $(document).ready(function() {
        $("#table-user").DataTable();
    });
</script>

  @endsection


