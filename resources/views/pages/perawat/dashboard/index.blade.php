@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">



                 <!--/ Revenue Report -->

                <!-- Earning Reports -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card h-100">
                      <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                          <h5 class="m-0 me-2">Transaksi Pemasukan Barang</h5>
                          <small class="text-muted">Data Pemasukan 5 Barang Terakhir</small>
                        </div>
                        <div class="dropdown">
                          <button
                            class="btn p-0"
                            type="button"
                            id="earningReports"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReports">
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pb-0">
                        <ul class="p-0 m-0">
                            @foreach ($masukbarangs as $masukbarang)
                            <li class="d-flex mb-3">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class="ti ti-chart-pie-2 ti-sm"></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $masukbarang->barang->name }}</h6>
                                        <small class="text-muted">{{ $masukbarang->jumlah }} {{ $masukbarang->barang->satuan->name }} - {{ $masukbarang->barang->category->name }}</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-3">
                                        <small>{{ $masukbarang->tanggal_masuk }}</small>

                                        {{-- <div class="d-flex align-items-center gap-1">

                                            <small>$1,619</small>
                                            <i class="ti ti-chevron-up text-success"></i>
                                            <small class="text-muted">18.6%</small>
                                        </div> --}}
                                    </div>
                                </div>
                            </li>
                        @endforeach


                        </ul>
                        <div id="reportBarChart"></div>
                      </div>
                    </div>
                  </div>
                  <!--/ Earning Reports -->
                <!-- Earning Reports -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card h-100">
                      <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                          <h5 class="m-0 me-2">Transaksi Pengeluaran Barang</h5>
                          <small class="text-muted">Data Pengeluaran 5 Barang Terakhir</small>
                        </div>
                        <div class="dropdown">
                          <button
                            class="btn p-0"
                            type="button"
                            id="earningReports"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReports">
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pb-0">
                        <ul class="p-0 m-0">
                            @foreach ($transaksis as $transaksi)
                            <li class="d-flex mb-3">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class="ti ti-chart-pie-2 ti-sm"></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $transaksi->barang->name }}</h6>
                                        <small class="text-muted">{{ $transaksi->jumlah }} {{ $transaksi->barang->satuan->name }} - {{ $transaksi->barang->category->name }}</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-3">
                                        <small>{{ $transaksi->tanggal_keluar }}</small>

                                        {{-- <div class="d-flex align-items-center gap-1">

                                            <small>$1,619</small>
                                            <i class="ti ti-chevron-up text-success"></i>
                                            <small class="text-muted">18.6%</small>
                                        </div> --}}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                        <div id="reportBarChart"></div>
                      </div>
                    </div>
                </div>
                  <!--/ Earning Reports -->

                    <!-- Earning Reports -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card h-100">
                      <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                          <h5 class="m-0 me-2">Stok Barang </h5>
                          <small class="text-muted">Tampilan 5 Barang Paling Sedikit</small>
                        </div>
                        <div class="dropdown">
                          <button
                            class="btn p-0"
                            type="button"
                            id="earningReports"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReports">
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pb-0">
                        <ul class="p-0 m-0">
                            @foreach ($stocks as $stock)
                            <li class="d-flex mb-3">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class="ti ti-chart-pie-2 ti-sm"></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $stock->barang->name }}</h6>
                                        <small class="text-muted">{{ $stock->stock }} {{ $stock->barang->satuan->name }} - {{ $stock->barang->category->name }}</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-3">
                                        <small>{{ now()->format('d/m/Y') }}</small>


                                        {{-- <div class="d-flex align-items-center gap-1">

                                            <small>$1,619</small>
                                            <i class="ti ti-chevron-up text-success"></i>
                                            <small class="text-muted">18.6%</small>
                                        </div> --}}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                        <div id="reportBarChart"></div>
                      </div>
                    </div>
                </div>
                  <!--/ Earning Reports -->


    </div>
</div>
@endsection
