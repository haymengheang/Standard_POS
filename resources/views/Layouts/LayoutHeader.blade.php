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
<img alt="User Profile" height="40px" width="40px" class="rounded-circle border" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDMp3fXTNt_wJeOsdNheI_vzVAgzd7XS1ObyVUEqAVu03h8rBEgEi7EbdPB9OTY0qnIWa1vh4lVQhExsnmWCL9fQBZeOEnDOCv1gwBkrgZpTZOo-ISlHg1EU1HTR42xfJ7-PVd2XJzJwn2F3OXemYnq-RwulMGvMAYyMJsqKSBgT9i5FUrmR5pEDshqvDCjC1D8F0VaynDf9vE96Q8OBl0YuXtBvqYNLXxCVwWq6zY6_jvDxIMFeEvOvvSLEpNZ0fRQTgiQwFud3kg"/>
</div>
<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="btn btn-outline-secondary btn-sm" type="submit">Logout</button>
</form>
</div>
</header>
