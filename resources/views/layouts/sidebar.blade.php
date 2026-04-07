<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion position-fixed" id="accordionSidebar" style="height:100vh;">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-text mx-3">SISTEM TOKO</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- DATA TOKO -->
    <li class="nav-item {{ request()->is('stores*') ? 'active' : '' }}">
        <a class="nav-link" href="/stores">
            <i class="fas fa-store"></i>
            <span>Data Toko</span>
        </a>
    </li>

    <!-- DATA KATEGORI -->
    <li class="nav-item {{ request()->is('categories*') ? 'active' : '' }}">
        <a class="nav-link" href="/categories">
            <i class="fas fa-tags"></i>
            <span>Data Kategori</span>
        </a>
    </li>

    <!-- DATA KOTA -->
<li class="nav-item {{ request()->is('cities*') ? 'active' : '' }}">
    <a class="nav-link" href="/cities">
        <i class="fas fa-city"></i>
        <span>Data Kota</span>
    </a>
</li>

</ul>