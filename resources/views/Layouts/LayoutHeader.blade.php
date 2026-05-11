<aside class="sidebar">
    <div class="sidebar-brand">
        <i class="bi bi-box-seam me-2"></i>INV-MGR
    </div>
    <nav class="nav flex-column">
        @php
    function active($route) {
        return request()->routeIs($route) ? 'active' : '';
    }
        @endphp
        <a class="nav-link {{ request()->routeIs('Show.Dasbord') ? 'active' : '' }}" data-purpose="nav-item" href="{{Route('Show.Dasbord')}}"><i class="bi bi-grid-1x2"></i> Dashboard</a>
        <a class="nav-link {{ request()->routeIs('Show.Product') ? 'active' : '' }}" data-purpose="nav-item" href="{{Route('Show.Product')}}"><i class="bi bi-box"></i> Products</a>
        <a class="nav-link {{ request()->routeIs('Show.ProductLine') ? 'active' : ''}}" data-purpose="nav-item" href="{{Route('Show.ProductLine')}}"><i class="bi bi-ui-checks-grid"></i> Products Line</a>
        <a class="nav-link {{ request()->routeIs('Show.Unitofmeasure') ? 'active' : '' }}" data-purpose="nav-item" href="{{Route('Show.Unitofmeasure')}}"><i class="bi bi-boxes"></i> Unit of Measure</a>
        <a class="nav-link" data-purpose="nav-item" href="#"><i class="bi bi-cart"></i> Orders</a>
        <a class="nav-link" data-purpose="nav-item" href="#"><i class="bi bi-people"></i> Customers</a>
        <a class="nav-link" data-purpose="nav-item" href="#"><i class="bi bi-stack"></i> Inventory</a>
        <a class="nav-link" data-purpose="nav-item" href="#"><i class="bi bi-graph-up"></i> Reports</a>
    </nav>
</aside>

<style>
    .dropdown-menu .dropdown-item{
        transition: all 0.2s ease;
    }

    .dropdown-menu .dropdown-item:hover{
        background-color: #f8f9fa;
        transform: translateX(3px);
    }

    .icon-box{
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }
</style>

<!-- END: Sidebar -->
<!-- BEGIN: Top Navigation -->
<header class="top-navbar">
    <div class="search-bar-top">
        <i class="bi bi-search"></i>
        <input class="form-control" placeholder="Search data..." type="text"/>
    </div>
    <div class="d-flex align-items-center gap-4">
        <div class="d-flex gap-3 fs-5 text-muted">
            <i class="bi bi-bell cursor-pointer" title="Notifications"></i>
            <i class="bi bi-gear cursor-pointer" title="Settings"></i>
        </div>
        <div class="vr mx-2" style="height: 30px;"></div>
        <div class="d-flex align-items-center gap-2">
            <div class="text-end d-none d-sm-block">
                <div class="fw-bold small">{{ auth()->user()->name ?? 'System User' }}</div>
                <div class="text-muted" style="font-size: 0.7rem;">{{ auth()->user()->email ?? 'Authenticated Account' }}</div>
            </div>

            <div class="dropdown">
                <button class="btn border-0 p-0 shadow-none" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDMp3fXTNt_wJeOsdNheI_vzVAgzd7XS1ObyVUEqAVu03h8rBEgEi7EbdPB9OTY0qnIWa1vh4lVQhExsnmWCL9fQBZeOEnDOCv1gwBkrgZpTZOo-ISlHg1EU1HTR42xfJ7-PVd2XJzJwn2F3OXemYnq-RwulMGvMAYyMJsqKSBgT9i5FUrmR5pEDshqvDCjC1D8F0VaynDf9vE96Q8OBl0YuXtBvqYNLXxCVwWq6zY6_jvDxIMFeEvOvvSLEpNZ0fRQTgiQwFud3kg"
                        alt="User Profile"
                        width="45"
                        height="45"
                        class="rounded-circle border border-2 border-light shadow-sm">
                </button>
                <ul class="dropdown-menu dropdown-menu-end mt-3 shadow border-0 rounded-4 p-2"
                    style="width: 240px;">

                    <!-- Profile -->
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-3 rounded-3 py-2"
                        href="{{ route('Information.Profile') }}">

                            <div class="icon-box bg-light">
                                <i class="fa-regular fa-circle-user text-warning"></i>
                            </div>

                            <div>
                                <div class="fw-semibold">My Profile</div>
                                <small class="text-muted">Manage account</small>
                            </div>
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <!-- Khmer -->
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-3 py-2"
                        href="{{ route('Product.ImportExcel') }}">

                            <img src="{{ asset('icon/cambodia-flag-icon.webp') }}"
                                width="28"
                                height="28"
                                class=""
                                alt="Khmer Flag">

                            <span class="fw-medium">Khmer</span>
                        </a>
                    </li>

                    <!-- English -->
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-3 py-2"
                        href="{{ route('Product.ImportExcel') }}">

                            <img src="{{ asset('icon/flat_english.png') }}"
                                width="28"
                                height="28"
                                class="border"
                                alt="English Flag">
                            <span class="fw-medium">English</span>
                        </a>
                    </li>

                    <!-- Chinese -->
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-3  py-2"
                        href="{{ route('Product.ImportExcel') }}">

                            <img src="{{ asset('icon/flag_chanice.png') }}"
                                width="28"
                                height="28"
                                class=" border"
                                alt="Chinese Flag">

                            <span class="fw-medium">Chinese</span>
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <!-- Logout -->
                   <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                    class="dropdown-item d-flex align-items-center gap-3 rounded-3 py-2 text-danger border-0 bg-transparent w-100">

                                <div class="icon-box bg-danger-subtle">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </div>

                                <span class="fw-medium">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

