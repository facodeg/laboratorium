<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('sneat') }}/assets/"
  data-template="vertical-menu-template-starter"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>APPS</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('sneat') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />


    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />


    {{-- <link href="{{ asset('sneat') }}/assets/vendor/libs/DataTables/datatables.min.css" rel="stylesheet"> --}}
{{--
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/flatpickr/flatpickr.css" /> --}}

    <!-- Page CSS -->

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />



    <!-- Helpers -->
    <script src="{{ asset('sneat') }}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('sneat') }}/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('sneat') }}/assets/js/config.js"></script>
    {{-- <script src="{{ asset('sneat') }}/assets/vendor/libs/jquery/jquery.js"></script> --}}
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('components.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('components.header')


          <!-- / Navbar -->

          <!-- Content wrapper -->
            <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              @include('flash::message')
              @yield('content')
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('components.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('sneat') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="{{ asset('sneat') }}/assets/vendor/libs/hammer/hammer.js"></script>

    <script src="{{ asset('sneat') }}/assets/vendor/js/menu.js"></script>
    {{-- <script src="{{ asset('backend') }}/assets/vendor/libs/DataTables/datatables.js"></script> --}}


    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('sneat') }}/assets/js/main.js"></script>

    <!-- Page JS -->

        <!-- Vendors JS -->
        <script src="{{ asset('sneat') }}/assets/vendor/libs/datatables/jquery.dataTables.js"></script>
        <script src="{{ asset('sneat') }}/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
        <script src="{{ asset('sneat') }}/assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
        <script src="{{ asset('sneat') }}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
        <!-- Flat Picker -->
        <script src="{{ asset('sneat') }}/assets/vendor/libs/moment/moment.js"></script>
        <script src="{{ asset('sneat') }}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
        <script src="{{ asset('sneat') }}/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
        <script src="{{ asset('sneat') }}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
        <script src="{{ asset('sneat') }}/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
           <!-- build:js assets/vendor/js/core.js -->


            <!-- Vendors JS -->



        <!-- Page JS -->
        {{-- <script src="{{ asset('sneat') }}/assets/js/tables-datatables-advanced.js"></script> --}}
  </body>
</html>
