<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="/dashboard/produk" class="nav-link {{ Request::is('dashboard/produk*') ? 'active' : '' }}"
                    aria-current="page">
                    Data Produk
                </a>
            </li>
            <li class="nav-item">
                <a href="/dashboard/transaksi"
                    class="nav-link {{ Request::is('dashboard/transaksi*') ? 'active' : '' }}" aria-current="page">
                    Data Transaksi
                </a>
            </li>
        </ul>
    </div>
</nav>
