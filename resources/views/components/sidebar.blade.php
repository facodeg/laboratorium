<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
          <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
              fill="#7367F0" />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
              fill="#161616" />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
              fill="#161616" />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
              fill="#7367F0" />
          </svg>
        </span>
        <span class="app-brand-text demo menu-text fw-bold">Laboratorium</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
        <!-- Page -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
          <a href="{{ route('dashboard.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div >Dashboards</div>
          </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kegiataan</span>
          </li>

        <li class="menu-item {{ Request::is('transaksi*') ? 'active' : '' }}">
            <a href="{{ route('transaksi.index') }}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-building-factory-2"></i>
              <div >Transaksi</div>
            </a>
          </li>

          <li class="menu-item {{ Request::is('masukbarang*') ? 'active' : '' }}">
            <a href="{{ route('masukbarang.index') }}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-truck"></i>
              <div >Masuk Barang</div>
            </a>
          </li>



          <li class="menu-item {{ Request::is('stock*') ? 'active' : '' }}">
            <a href="{{ route('stock.index') }}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-home"></i>
              <div >Stock</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master</span>
          </li>

        <li class="menu-item {{ Request::is('satuan*') ||  Request::is('barang*') || Request::is('category*') ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-files"></i>
                <div data-i18n="Front Pages">Data Barang</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('satuan*') ? 'active' : '' }}">
                    <a href="{{ route('satuan.index') }}" class="menu-link{{ Request::is('satuan*') ? ' active' : '' }}">
                        <div data-i18n="Landing">Satuan</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('category*') ? 'active' : '' }}">
                    <a href="{{ route('category.index') }}" class="menu-link{{ Request::is('category*') ? ' active' : '' }}">
                        <div data-i18n="Pricing">Category</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('barang*') ? 'active' : '' }}">
                    <a href="{{ route('barang.index') }}" class="menu-link{{ Request::is('barang*') ? ' active' : '' }}">
                        <div data-i18n="Pricing">Barang</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen Akun</span>
          </li>

        <li class="menu-item {{ Request::is('users*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-users"></i>
              <div >Users</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Laporan</span>
          </li>

          <li class="menu-item {{ Request::is('kartu*') ? 'active' : '' }}">
            <a href="{{ route('kartu.create') }}"" class="menu-link">
              <i class="menu-icon tf-icons ti ti-report"></i>
              <div >Laporan Kartu Stock</div>
            </a>
          </li>

      </ul>
  </aside>
