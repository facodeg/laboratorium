@extends('layouts.app')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div >
                @include('layouts.alert')
            </div>
        </div>
      </div>
    </div>
    <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3 d-flex justify-content-between align-items-center">
                    Search Filter
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah</a>
                </h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-12">
                        <form method="GET" action="{{ route('category.index') }}">
                        <div class="input-group">

                            <input type="text" class="form-control" placeholder="Search" name="nama">
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
                    <table class="dt-complex-header table table-bordered " id="table-category">
                        <thead>
                            <tr >
                                <th>No</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="{{ route('category.edit', $category->id) }}"
                                                ><i class="ti ti-pencil me-1"></i> Edit</a
                                              >
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="ml-2">
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
                    {{ $categorys->withQueryString()->links() }}
                </div>
            </div>
        </div>

      <script type="text/javascript">
        $(document).ready(function() {
            $("#table-category").DataTable();
        });
    </script>

  @endsection


