
@extends('layouts.app')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-1 mb-1">
            <div class="col-12">
                <div>
                    @include('layouts.alert')
                </div>
            </div>
        </div>
    </div>

    <!-- Basic Layout -->

    <div class="row  no-print">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Kartu Stock Barang</h5>
                </div>
                <form method="GET" action="{{ route('kartu.create') }}">
                    @csrf


                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <div class="input-group input-daterange" id="bs-datepicker-daterange">
                            <input type="date" id="dateRangePicker" placeholder="MM/DD/YYYY" class="form-control @error('tanggal_awal') is-invalid @enderror"
                            name="tanggal_awal">
                            @error('tanggal_awal')
                            <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                            <span class="input-group-text">to</span>
                            <input type="date" placeholder="MM/DD/YYYY" class="form-control @error('tanggal_akhir') is-invalid @enderror"
                            name="tanggal_akhir">
                            @error('tanggal_akhir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                     </div>



                        <div class="mb-3">
                            <label class="form-label">Barang</label>
                            <div class="select-group select-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-package"></i>
                                        <select  data-live-search="true" data-style="btn-default" class="selectpicker w-100 @error('id_barang') is-invalid @enderror"
                                        name="id_barang">
                                        <option value="">Pilih Barang</option>

                                        @foreach ($barangs as $barang)
                                        {{-- Mengambil stok dari tabel tb_stock --}}
                                        @php
                                            $stock = App\Models\Stock::where('id_barang', $barang->id)->first();
                                        @endphp
                                        {{-- Menampilkan opsi dropdown dengan informasi stok --}}
                                        <option value="{{ $barang->id }}">{{ $barang->name }} - {{ $barang->spesifikasi }} [{{ $barang->category->name }}] @if($stock) (Stok: {{ $stock->stock }}  {{ $barang->satuan->name }}) @endif</option>
                                         @endforeach

                                    </select>
                                    @error('id_barang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </span>

                            </div>
                        </div>



                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">

                <div class="card  no-print">
                    <div class="card-header border-bottom">

                        <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                            <style>
                                @media print {
                                    /* Sembunyikan elemen-elemen yang tidak perlu dicetak */
                                    .no-print {
                                        display: none;
                                    }

                                    /* Atur lebar tabel agar sesuai dengan kertas */
                                    table {
                                        width: 100%;
                                    }
                                }
                            </style>
                             @if(!empty($tanggalAwal) && !empty($tanggalAkhir))
                            <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0 no-print">
                                <div class="col-md-12">
                                    <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <style>
                    @media not print {
                        .print-show {
                            display: none !important;
                        }
                    }
                </style>

                <div class="card">
                    @if($barangHistories->isNotEmpty() && $barangHistories->first()->barang)
                    <div class="card-header border-bottom print-show">
                        <h5 class="mb-0">Kartu Stock Barang: {{ $barangHistories->first()->barang->name }}</h5>
                        <p class="mb-0">Periode: {{ $tanggalAwal }} sampai {{ $tanggalAkhir }}</p>
                    </div>
                      @endif
                    <div class="card-datatable table-responsive pt-3">
                        <table class="dt-complex-header table table-bordered" id="table-barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Jumlah Keluar</th>
                                    <th>Jumlah Sisa</th>
                                    <th>Kondisi</th>
                                    <th>Label</th>
                                    <th>Diinput Oleh</th>
                                    <th>Diinput Tanggal</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangHistories as $barangHistory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barangHistory->barang->name }}</td>
                                    <td>{{ $barangHistory->tanggal }}</td>
                                    <td>{{ $barangHistory->masuk ?? 0 }}</td>
                                    <td>{{ $barangHistory->keluar ?? 0 }}</td>
                                    <td>{{ $barangHistory->jumlah_sisa }}</td>
                                    <td>
                                        @if($barangHistory->kondisi === 1)
                                            Baik
                                        @elseif($barangHistory->kondisi === 2)
                                            Tidak Baik
                                        @else
                                            Baik
                                        @endif
                                    </td>

                                    <td>
                                        @if($barangHistory->label === 1)
                                            Terpasang
                                        @elseif($barangHistory->label === 2)
                                            Tidak Terpasang
                                        @else
                                            Terpasang
                                        @endif
                                    </td>

                                    <td>{{ $barangHistory->user->name }}</td>
                                    <td>{{ $barangHistory->created_at }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right">
                        {{ $barangHistories->withQueryString()->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>


    </div>
@endsection




