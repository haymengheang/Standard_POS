<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Product Management - Inventory System</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
        :root {
            --primary-color: #ec5b13;
            --bg-light: #f8f6f6;
            --text-dark: #0f172a;
            --text-muted: #64748b;
        }
        body {
            font-family: 'Public Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.75rem 2.5rem;
            position: sticky;
            top: 0;
            z-index: 1030;
        }
        .nav-link {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted) !important;
            padding: 0.5rem 1rem !important;
        }
        .nav-link.active {
            color: var(--primary-color) !important;
            border-bottom: 2px solid var(--primary-color);
            font-weight: 600;
        }
        .logo-box {
            background-color: var(--primary-color);
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 12px;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-size: cover;
            background-position: center;
            border: 1px solid #e2e8f0;
        }
        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            font-weight: 700;
            border-radius: 12px;
            padding: 0.625rem 1.25rem;
            box-shadow: 0 4px 12px rgba(236, 91, 19, 0.2);
            transition: all 0.2s;
        }
        .btn-primary-custom:hover {
            background-color: #d45211;
            border-color: #d45211;
            color: white;
            transform: translateY(-1px);
        }
        .search-container {
            position: relative;
        }
        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }
        .search-input {
            padding-left: 2.75rem;
            border-radius: 12px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            height: 48px;
        }
        .filter-btn {
            background-color: #f1f5f9;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .filter-btn:hover {
            background-color: #e2e8f0;
        }
        .card-custom {
            background: white;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .table-custom thead th {
            background-color: #f8fafc;
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e2e8f0;
        }
        .table-custom tbody td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
            font-size: 0.875rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .product-id {
            color: var(--primary-color);
            font-weight: 500;
        }
        .uom-badge {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 700;
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
        }
        .product-photo {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #e2e8f0;
        }
        .action-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .action-link:hover {
            color: #d45211;
        }
        footer {
            background-color: #fff;
            border-top: 1px solid #e2e8f0;
            padding: 2rem 0;
            margin-top: auto;
        }
        .footer-logo-small {
            background-color: rgba(236, 91, 19, 0.15);
            width: 24px;
            height: 24px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            margin-right: 8px;
        }
        .footer-links a {
            color: var(--text-muted);
            font-size: 0.75rem;
            text-decoration: none;
            margin-left: 1.5rem;
        }
        .footer-links a:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
<header class="navbar navbar-expand-md">
<div class="container-fluid max-w-7xl">
<div class="d-flex align-items-center">
<div class="logo-box">
<span class="material-symbols-outlined fs-5">inventory_2</span>
</div>
<span class="h5 mb-0 fw-bold">Product Management</span>
</div>
<button class="navbar-toggler" data-bs-target="#navbarContent" data-bs-toggle="collapse" type="button">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarContent">
<ul class="navbar-nav ms-auto align-items-center gap-2">
<li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
<li class="nav-item"><a class="nav-link active" href="#">Inventory</a></li>
<li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
<li class="nav-item"><a class="nav-link" href="#">Analytics</a></li>
<li class="nav-item ms-md-4">
<div class="user-avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBPZyP5i7S6VrA2et724Ehk1Vw-YTIz1IaNbB_QnAwrknnEwwgznjLJYfsoV0JxXFqsnjCJLHJJg2zFlHxUn5GyPpcK3uAW41yXl4zrCrSZTqiTQ_IzFeosqMOQRSd1sWWYp5CLb5Dhs4hkfZRJH9c32NWO3XWSt2f106EEVvgkVgqMreturSuqWt0D8KZEGornj3LgtdasA6MeysdxHX9F6xD6oqLi_rpmy6Gj3tbgTjyTNXhUsgIh5w3RcvtDKqROe6HYogUZJK0");'></div>
</li>
</ul>
</div>
</div>
</header>
<main class="container py-5" style="max-width: 1280px;">
<!-- Title Section -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
<div>
<h1 class="fw-bolder tracking-tight mb-1">Products</h1>
<p class="text-secondary small mb-0">Manage your catalog and stock levels</p>
</div>
<a href="{{ route('Save.Information') }}" class="btn btn-primary-custom d-flex align-items-center gap-2">
    <span class="material-symbols-outlined fs-5">add</span>
    Add New Product
</a>
</div>
<!-- Search & Filters -->
<div class="card-custom p-4 mb-4">
<div class="search-container mb-3">
<span class="material-symbols-outlined search-icon">search</span>
<input class="form-control search-input" placeholder="Search by ID, name or category..." type="text"/>
</div>
<div class="d-flex flex-wrap align-items-center gap-2">
<button class="btn filter-btn">Category <span class="material-symbols-outlined fs-6">expand_more</span></button>
<button class="btn filter-btn">Stock Status <span class="material-symbols-outlined fs-6">expand_more</span></button>
<button class="btn filter-btn">Price Range <span class="material-symbols-outlined fs-6">expand_more</span></button>
<button class="btn filter-btn">Supplier <span class="material-symbols-outlined fs-6">expand_more</span></button>
<button class="btn btn-link ms-auto text-decoration-none fw-semibold p-0" style="color: var(--primary-color);">Clear all filters</button>
</div>
</div>
<!-- Table -->
<div class="card-custom">
<div class="table-responsive">
<table class="table table-custom table-hover mb-0">
<thead>
<tr>
<th>Product ID</th>
<th>Description</th>
<th>Specs/Note</th>
<th>Unit Price</th>
<th>Other Price</th>
<th>UOM</th>
<th>Product Line</th>
<th>Photo</th>
<th style="color: var(--primary-color);">Action</th>
</tr>
</thead>
<tbody>
<tr>
<td class="product-id">PID-001</td>
<td class="fw-semibold">Industrial Drill</td>
<td class="text-muted">Heavy duty 20V Max</td>
<td class="fw-bold">$99.99</td>
<td class="text-muted opacity-75">$120.00</td>
<td><span class="uom-badge">PCS</span></td>
<td class="text-muted">Power Tools</td>
<td>
<img alt="Industrial Drill" class="product-photo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZqLCtk_UtOC4U1u5CNf5Mdh4jZUjua_dOEYvwSMrinrJU5spqzQzjrq3NIdlu8H5CtgkBc3hCKNr7EGGh9sjFzI375ErtWqcn3z066HVmRi4AXBqgU09rmW0KFiKpUiLEk_F8zvXhRpe5BxCKKS9fnDUjEFgdUy5jVJxj5TZSanqbTteRY0B6ngop6nyUQjTc4o6TArNnS3ekrQfR0pJJ2G-sxss1HzCkZz962I1SaemK_b1p0Q9zKtZCECLkC_i89dutn9fHxFU"/>
</td>
<td>
<a class="action-link" href="#">View <span class="material-symbols-outlined fs-6">visibility</span></a>
</td>
</tr>
<tr>
<td class="product-id">PID-002</td>
<td class="fw-semibold">Safety Helmet</td>
<td class="text-muted">Grade A Protection</td>
<td class="fw-bold">$25.00</td>
<td class="text-muted opacity-75">$35.00</td>
<td><span class="uom-badge">UNIT</span></td>
<td class="text-muted">Safety Gear</td>
<td>
<img alt="Safety Helmet" class="product-photo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXaUdlHk25Jfhe0x7EUIKwioJUyP9DGouT47ajHtpQFvTcAWzWc4Y7LgcYqw0q91Ld3LO-eQL_T00lIVyXX4fRxkdXXbPw48_-axqBYnqT1_jvCiTkfafC04US4i6GkhtwoWvfHvw9xV_UfHQmxH3u8HKQlv2adO2TVH8eL7psmYKEsIe605xzYMCIfKmKyJNWE3oImEnMDLPsrh5bAjAn1astccV_M5Yvv7jbGF_PPECLaMy0HyX3TFJejob8p3rbHSzZBsq6hz4"/>
</td>
<td>
<a class="action-link" href="#">View <span class="material-symbols-outlined fs-6">visibility</span></a>
</td>
</tr>
<tr>
<td class="product-id">PID-003</td>
<td class="fw-semibold">Work Gloves</td>
<td class="text-muted">Leather reinforced</td>
<td class="fw-bold">$15.50</td>
<td class="text-muted opacity-75">$20.00</td>
<td><span class="uom-badge">PAIR</span></td>
<td class="text-muted">Apparel</td>
<td>
<img alt="Work Gloves" class="product-photo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuATrpAQORiEovUn4iETMaESU6C3ndb66RFlhPEjFt0nKLf6E0wkes4xybzJyE9ukkZrj8Xmm3TEKU0sxVgREozlYcDzM-_k0w6tDJaF19eAZX9ArG7SbhnhDfblRgtK0blGujIVR0AF4xA61WNal2RPILsbT0dcruLaE0zziC1xFUQXCxFaIHMY8iY1p9bqU2-yxXJk86NoOLqK58DSPwAunKkeoB0WJzx5C5dd27uOQgbrSCaspp97llQ0aLsnD0kggGzvUHBtCZM"/>
</td>
<td>
<a class="action-link" href="#">View <span class="material-symbols-outlined fs-6">visibility</span></a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Pagination -->
<div class="d-flex justify-content-between align-items-center mt-4 px-2">
<p class="text-secondary small mb-0">Showing <span class="fw-bold text-dark">1</span> to <span class="fw-bold text-dark">3</span> of <span class="fw-bold text-dark">24</span> products</p>
<div class="btn-group gap-2">
<button class="btn btn-outline-secondary border-secondary-subtle btn-sm px-3 rounded" disabled="">Previous</button>
<button class="btn btn-outline-secondary border-secondary-subtle btn-sm px-3 rounded">Next</button>
</div>
</div>
</main>





<footer>
<div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3" style="max-width: 1280px;">
<div class="d-flex align-items-center">
<div class="footer-logo-small">
<span class="material-symbols-outlined" style="font-size: 14px;">inventory_2</span>
</div>
<span class="fw-bold small">Inventory Solutions</span>
</div>
<p class="text-secondary mb-0 small" style="font-size: 0.75rem;">© 2023 Inventory Management Solutions. All rights reserved.</p>
<div class="footer-links">
<a href="#">Privacy Policy</a>
<a href="#">Terms of Service</a>
</div>
</div>
</footer>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body></html>