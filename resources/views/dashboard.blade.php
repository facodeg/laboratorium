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
                          <small class="text-muted">Data Pemasukan 5 Barang terakhir</small>
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
                          <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                              <span class="avatar-initial rounded bg-label-primary"
                                ><i class="ti ti-chart-pie-2 ti-sm"></i
                              ></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Net Profit</h6>
                                <small class="text-muted">12.4k Sales</small>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-3">
                                <small>$1,619</small>
                                <div class="d-flex align-items-center gap-1">
                                  <i class="ti ti-chevron-up text-success"></i>
                                  <small class="text-muted">18.6%</small>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                              <span class="avatar-initial rounded bg-label-success"
                                ><i class="ti ti-currency-dollar ti-sm"></i
                              ></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Total Income</h6>
                                <small class="text-muted">Sales, Affiliation</small>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-3">
                                <small>$3,571</small>
                                <div class="d-flex align-items-center gap-1">
                                  <i class="ti ti-chevron-up text-success"></i>
                                  <small class="text-muted">39.6%</small>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                              <span class="avatar-initial rounded bg-label-secondary"
                                ><i class="ti ti-credit-card ti-sm"></i
                              ></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Total Expenses</h6>
                                <small class="text-muted">ADVT, Marketing</small>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-3">
                                <small>$430</small>
                                <div class="d-flex align-items-center gap-1">
                                  <i class="ti ti-chevron-up text-success"></i>
                                  <small class="text-muted">52.8%</small>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <div id="reportBarChart"></div>
                      </div>
                    </div>
                  </div>
                  <!--/ Earning Reports -->

                  <!-- Popular Product -->
                  <div class="col-md-6 col-xl-4 mb-4">
                    <div class="card h-100">
                      <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0 me-2">
                          <h5 class="m-0 me-2">Popular Products</h5>
                          <small class="text-muted">Total 10.4k Visitors</small>
                        </div>
                        <div class="dropdown">
                          <button
                            class="btn p-0"
                            type="button"
                            id="popularProduct"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="popularProduct">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <ul class="p-0 m-0">
                          <li class="d-flex mb-4 pb-1">
                            <div class="me-3">
                              <img src="../../assets/img/products/iphone.png" alt="User" class="rounded" width="46" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Apple iPhone 13</h6>
                                <small class="text-muted d-block">Item: #FXZ-4567</small>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <p class="mb-0 fw-medium">$999.29</p>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex mb-4 pb-1">
                            <div class="me-3">
                              <img
                                src="../../assets/img/products/nike-air-jordan.png"
                                alt="User"
                                class="rounded"
                                width="46" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Nike Air Jordan</h6>
                                <small class="text-muted d-block">Item: #FXZ-3456</small>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <p class="mb-0 fw-medium">$72.40</p>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex mb-4 pb-1">
                            <div class="me-3">
                              <img src="../../assets/img/products/headphones.png" alt="User" class="rounded" width="46" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Beats Studio 2</h6>
                                <small class="text-muted d-block">Item: #FXZ-9485</small>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <p class="mb-0 fw-medium">$99</p>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex mb-4 pb-1">
                            <div class="me-3">
                              <img
                                src="../../assets/img/products/apple-watch.png"
                                alt="User"
                                class="rounded"
                                width="46" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Apple Watch Series 7</h6>
                                <small class="text-muted d-block">Item: #FXZ-2345</small>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <p class="mb-0 fw-medium">$249.99</p>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex mb-4 pb-1">
                            <div class="me-3">
                              <img
                                src="../../assets/img/products/amazon-echo.png"
                                alt="User"
                                class="rounded"
                                width="46" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Amazon Echo Dot</h6>
                                <small class="text-muted d-block">Item: #FXZ-8959</small>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <p class="mb-0 fw-medium">$79.40</p>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex">
                            <div class="me-3">
                              <img
                                src="../../assets/img/products/play-station.png"
                                alt="User"
                                class="rounded"
                                width="46" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Play Station Console</h6>
                                <small class="text-muted d-block">Item: #FXZ-7892</small>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <p class="mb-0 fw-medium">$129.48</p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!--/ Popular Product -->

                  <!-- Sales by Countries tabs-->
                  <div class="col-md-6 col-xl-4 col-xl-4 mb-4">
                    <div class="card h-100">
                      <div class="card-header d-flex justify-content-between pb-2 mb-1">
                        <div class="card-title mb-1">
                          <h5 class="m-0 me-2">Sales by Countries</h5>
                          <small class="text-muted">62 Deliveries in Progress</small>
                        </div>
                        <div class="dropdown">
                          <button
                            class="btn p-0"
                            type="button"
                            id="salesByCountryTabs"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="nav-align-top">
                          <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                              <button
                                type="button"
                                class="nav-link active"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#navs-justified-new"
                                aria-controls="navs-justified-new"
                                aria-selected="true">
                                New
                              </button>
                            </li>
                            <li class="nav-item">
                              <button
                                type="button"
                                class="nav-link"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#navs-justified-link-preparing"
                                aria-controls="navs-justified-link-preparing"
                                aria-selected="false">
                                Preparing
                              </button>
                            </li>
                            <li class="nav-item">
                              <button
                                type="button"
                                class="nav-link"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#navs-justified-link-shipping"
                                aria-controls="navs-justified-link-shipping"
                                aria-selected="false">
                                Shipping
                              </button>
                            </li>
                          </ul>
                          <div class="tab-content pb-0">
                            <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                              <ul class="timeline timeline-advance timeline-advance mb-2 pb-1">
                                <li class="timeline-item ps-4 border-left-dashed">
                                  <span class="timeline-indicator timeline-indicator-success">
                                    <i class="ti ti-circle-check"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-success text-uppercase fw-medium">sender</small>
                                    </div>
                                    <h6 class="mb-0">Myrtle Ullrich</h6>
                                    <p class="text-muted mb-0 text-nowrap">101 Boulder, California(CA), 95959</p>
                                  </div>
                                </li>
                                <li class="timeline-item ps-4 border-transparent">
                                  <span class="timeline-indicator timeline-indicator-primary">
                                    <i class="ti ti-map-pin"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                    </div>
                                    <h6 class="mb-0">Barry Schowalter</h6>
                                    <p class="text-muted mb-0 text-nowrap">939 Orange, California(CA),92118</p>
                                  </div>
                                </li>
                              </ul>
                              <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                              <ul class="timeline timeline-advance mb-0">
                                <li class="timeline-item ps-4 border-left-dashed">
                                  <span class="timeline-indicator timeline-indicator-success">
                                    <i class="ti ti-circle-check"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-success text-uppercase fw-medium">sender</small>
                                    </div>
                                    <h6 class="mb-0">Veronica Herman</h6>
                                    <p class="text-muted mb-0 text-nowrap">162 Windsor, California(CA), 95492</p>
                                  </div>
                                </li>
                                <li class="timeline-item ps-4 border-transparent">
                                  <span class="timeline-indicator timeline-indicator-primary">
                                    <i class="ti ti-map-pin"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                    </div>
                                    <h6 class="mb-0">Helen Jacobs</h6>
                                    <p class="text-muted mb-0 text-nowrap">487 Sunset, California(CA), 94043</p>
                                  </div>
                                </li>
                              </ul>
                            </div>

                            <div class="tab-pane fade" id="navs-justified-link-preparing" role="tabpanel">
                              <ul class="timeline timeline-advance mb-2 pb-1">
                                <li class="timeline-item ps-4 border-left-dashed">
                                  <span class="timeline-indicator timeline-indicator-success">
                                    <i class="ti ti-circle-check"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-success text-uppercase fw-medium">sender</small>
                                    </div>
                                    <h6 class="mb-0">Barry Schowalter</h6>
                                    <p class="text-muted mb-0 text-nowrap">939 Orange, California(CA),92118</p>
                                  </div>
                                </li>
                                <li class="timeline-item ps-4 border-transparent">
                                  <span class="timeline-indicator timeline-indicator-primary">
                                    <i class="ti ti-map-pin"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                    </div>
                                    <h6 class="mb-0">Myrtle Ullrich</h6>
                                    <p class="text-muted mb-0 text-nowrap">101 Boulder, California(CA), 95959</p>
                                  </div>
                                </li>
                              </ul>
                              <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                              <ul class="timeline timeline-advance mb-0">
                                <li class="timeline-item ps-4 border-left-dashed">
                                  <span class="timeline-indicator timeline-indicator-success">
                                    <i class="ti ti-circle-check"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-success text-uppercase fw-medium">sender</small>
                                    </div>
                                    <h6 class="mb-0">Veronica Herman</h6>
                                    <p class="text-muted mb-0 text-nowrap">162 Windsor, California(CA), 95492</p>
                                  </div>
                                </li>
                                <li class="timeline-item ps-4 border-transparent">
                                  <span class="timeline-indicator timeline-indicator-primary">
                                    <i class="ti ti-map-pin"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                    </div>
                                    <h6 class="mb-0">Helen Jacobs</h6>
                                    <p class="text-muted mb-0 text-nowrap">487 Sunset, California(CA), 94043</p>
                                  </div>
                                </li>
                              </ul>
                            </div>
                            <div class="tab-pane fade" id="navs-justified-link-shipping" role="tabpanel">
                              <ul class="timeline timeline-advance mb-2 pb-1">
                                <li class="timeline-item ps-4 border-left-dashed">
                                  <span class="timeline-indicator timeline-indicator-success">
                                    <i class="ti ti-circle-check"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-success text-uppercase fw-medium">sender</small>
                                    </div>
                                    <h6 class="mb-0">Veronica Herman</h6>
                                    <p class="text-muted mb-0 text-nowrap">101 Boulder, California(CA), 95959</p>
                                  </div>
                                </li>
                                <li class="timeline-item ps-4 border-transparent">
                                  <span class="timeline-indicator timeline-indicator-primary">
                                    <i class="ti ti-map-pin"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                    </div>
                                    <h6 class="mb-0">Barry Schowalter</h6>
                                    <p class="text-muted mb-0 text-nowrap">939 Orange, California(CA),92118</p>
                                  </div>
                                </li>
                              </ul>
                              <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                              <ul class="timeline timeline-advance mb-0">
                                <li class="timeline-item ps-4 border-left-dashed">
                                  <span class="timeline-indicator timeline-indicator-success">
                                    <i class="ti ti-circle-check"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-success text-uppercase fw-medium">sender</small>
                                    </div>
                                    <h6 class="mb-0">Myrtle Ullrich</h6>
                                    <p class="text-muted mb-0 text-nowrap">162 Windsor, California(CA), 95492</p>
                                  </div>
                                </li>
                                <li class="timeline-item ps-4 border-transparent">
                                  <span class="timeline-indicator timeline-indicator-primary">
                                    <i class="ti ti-map-pin"></i>
                                  </span>
                                  <div class="timeline-event ps-0 pb-0">
                                    <div class="timeline-header">
                                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                    </div>
                                    <h6 class="mb-0">Helen Jacobs</h6>
                                    <p class="text-muted mb-0 text-nowrap">487 Sunset, California(CA), 94043</p>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/ Sales by Countries tabs -->




        {{-- <div class="col-md-12">
            <div class="card">
                <div class="card-header">Hai , Semuanya</div>




                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
