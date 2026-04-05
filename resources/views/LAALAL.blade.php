<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Create New Product - StockMaster</title>
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
            --card-shadow: 0 1px 3px rgba(0,0,0,0.05);
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Public Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            margin: 0;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: #fff;
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 1000;
        }

        .sidebar-brand {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
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
        }

        .nav-item-custom {
            padding: 0.5rem 1.5rem;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link-custom:hover {
            background-color: #f1f5f9;
            color: var(--text-dark);
        }

        .nav-link-custom.active {
            background-color: rgba(236, 91, 19, 0.1);
            color: var(--primary-color);
            border-right: 4px solid var(--primary-color);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .storage-card {
            margin: 1.5rem;
            padding: 1rem;
            background-color: #f1f5f9;
            border-radius: 12px;
            margin-top: auto;
        }

        /* Main Content Styles */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        header.top-nav {
            height: 64px;
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .search-wrapper {
            position: relative;
            max-width: 400px;
            width: 100%;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 20px;
        }

        .search-input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border-radius: 8px;
            border: 1px solid transparent;
            background-color: #f1f5f9;
            font-size: 0.875rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: 1.5rem;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Form Layout */
        .content-body {
            padding: 2rem;
        }

        .breadcrumb-custom {
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            color: var(--text-muted);
        }

        .breadcrumb-custom a {
            color: inherit;
            text-decoration: none;
        }

        .breadcrumb-custom a:hover {
            color: var(--primary-color);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
        }

        .card-custom {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: var(--card-shadow);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-title {
            font-weight: 700;
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
            color: var(--text-dark);
        }

        .form-label {
            font-weight: 600;
            font-size: 0.875rem;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(236, 91, 19, 0.1);
        }

        /* Buttons */
        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            font-weight: 700;
            border-radius: 10px;
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

        .btn-cancel {
            background-color: white;
            border: 1px solid #cbd5e1;
            color: #475569;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.625rem 1.25rem;
        }

        .btn-cancel:hover {
            background-color: #f8fafc;
        }

        /* Upload Area */
        .upload-area {
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 2.5rem 1rem;
            text-align: center;
            background-color: #f8fafc;
            cursor: pointer;
            transition: all 0.2s;
        }

        .upload-area:hover {
            border-color: var(--primary-color);
            background-color: rgba(236, 91, 19, 0.02);
        }

        .upload-icon {
            font-size: 3rem;
            color: #94a3b8;
            margin-bottom: 0.75rem;
        }

        .upload-thumbnails {
            display: flex;
            gap: 12px;
            margin-top: 1rem;
        }

        .thumb-box {
            width: 64px;
            height: 64px;
            border-radius: 8px;
            background-color: #f1f5f9;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
        }

        .thumb-add {
            border: 2px dashed #cbd5e1;
            background: transparent;
        }

        /* Pro Tip Alert */
        .pro-tip {
            background-color: rgba(236, 91, 19, 0.05);
            border: 1px solid rgba(236, 91, 19, 0.1);
            border-radius: 12px;
            padding: 1.25rem;
        }

        .pro-tip-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 0.5rem;
        }

        .pro-tip-text {
            font-size: 0.8125rem;
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 0;
        }

        @media (max-width: 991.98px) {
            .sidebar { display: none; }
            .main-wrapper { margin-left: 0; }
            .top-nav { padding: 0 1rem; }
            .content-body { padding: 1.5rem 1rem; }
        }
    </style>
</head>
<body>
<!-- Sidebar Navigation -->
<aside class="sidebar">
<div class="sidebar-brand">
<div class="logo-box">
<span class="material-symbols-outlined fs-5">inventory_2</span>
</div>
<span class="h5 mb-0 fw-bold">StockMaster</span>
</div>
<nav class="flex-grow-1">
<div class="nav-item-custom">
<a class="nav-link-custom" href="#">
<span class="material-symbols-outlined">grid_view</span>
                    Dashboard
                </a>
</div>
<div class="nav-item-custom">
<a class="nav-link-custom active" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1">package_2</span>
                    Products
                </a>
</div>
<div class="nav-item-custom">
<a class="nav-link-custom" href="#">
<span class="material-symbols-outlined">shopping_cart</span>
                    Orders
                </a>
</div>
<div class="nav-item-custom">
<a class="nav-link-custom" href="#">
<span class="material-symbols-outlined">group</span>
                    Customers
                </a>
</div>
<div class="nav-item-custom">
<a class="nav-link-custom" href="#">
<span class="material-symbols-outlined">warehouse</span>
                    Inventory
                </a>
</div>
<div class="nav-item-custom">
<a class="nav-link-custom" href="#">
<span class="material-symbols-outlined">bar_chart</span>
                    Reports
                </a>
</div>
</nav>
<div class="storage-card">
<p class="text-uppercase fw-bold text-muted mb-2" style="font-size: 10px; letter-spacing: 0.05em;">Storage Plan</p>
<div class="progress mb-2" style="height: 6px;">
<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" class="progress-bar" role="progressbar" style="width: 75%; background-color: var(--primary-color);"></div>
</div>
<p class="mb-0 text-muted" style="font-size: 11px;">75% of 500GB used</p>
</div>
</aside>
<!-- Main Content -->
<div class="main-wrapper">
<header class="top-nav">
<div class="search-wrapper">
<span class="material-symbols-outlined search-icon">search</span>
<input class="search-input" placeholder="Search products, orders..." type="text"/>
</div>
<div class="ms-auto d-flex align-items-center gap-3">
<button class="btn p-1 text-muted"><span class="material-symbols-outlined">notifications</span></button>
<button class="btn p-1 text-muted"><span class="material-symbols-outlined">settings</span></button>
<div class="vr mx-2 text-muted opacity-25" style="height: 24px;"></div>
<div class="user-profile">
<img alt="Alex Rivera" class="user-avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuArazwAklJe4m3AhEu9Zou7T3vt1y837qoMnG2TH-LXKVz3lc6CvIFSrJrxL714Yk7mOVKcsqPdXSvA20zdXoafPxfXr4_lwMKevGardNyYE3Om_EJ5tW_AfEFYmuLpft9_Z1ZkxucMXrim8VEv_GcKIMPwc2nZJ60rpYRVL9Zo3oMjVTFkAbjsk4CwhVMqFT3fWYSonZQ3F6eOYHC2XWp0eZfXAOYuuw2fKpXAi8m4HFQcoP_2L1RofuyXpDOPPyh5de-u8LZFrqg"/>
<span class="fw-semibold small d-none d-sm-inline">Alex Rivera</span>
</div>
</div>
</header>
<div class="content-body">
<!-- Breadcrumbs -->
<div class="breadcrumb-custom">
<a href="#">Dashboard</a> / <a href="#">Products</a> / <span class="text-dark fw-semibold">Create New Product</span>
</div>
<!-- Header Area -->
<div class="page-header mt-1">
<div>
<h2 class="fw-bold mb-1">Create New Product</h2>
<p class="text-muted small mb-0">Fill in the details to add a new item to your global inventory.</p>
</div>
<div class="d-none d-md-flex gap-2">
<button class="btn btn-cancel" type="button">Cancel</button>
<button class="btn btn-primary-custom" id="saveProductBtn" type="button">Save Product</button>
</div>
</div>
<!-- Form Content -->
<div class="row">
<div class="col-lg-8">
<!-- General Information Card -->
<div class="card-custom">
<h3 class="card-title">General Information</h3>
<div class="row g-4">
<div class="col-md-6">
<label class="form-label">Product Name</label>
<input class="form-control" placeholder="e.g. Wireless Headphone Pro" type="text"/>
</div>
<div class="col-md-6">
<label class="form-label">Product ID</label>
<input class="form-control" placeholder="SKU-8923-01" type="text"/>
</div>
<div class="col-12">
<label class="form-label">Description</label>
<textarea class="form-control" placeholder="Describe the product's main features and benefits..." rows="5"></textarea>
</div>
<div class="col-md-6">
<label class="form-label">Category</label>
<select class="form-select">
<option disabled="" selected="">Select Category</option>
<option>Electronics</option>
<option>Accessories</option>
<option>Hardware</option>
</select>
</div>
<div class="col-md-6">
<label class="form-label">Product Line</label>
<select class="form-select">
<option disabled="" selected="">Select Product Line</option>
<option>Premium Series</option>
<option>Standard</option>
</select>
</div>
</div>
</div>
<!-- Pricing & Measurements Card -->
<div class="card-custom">
<h3 class="card-title">Pricing &amp; Measurements</h3>
<div class="row g-4">
<div class="col-md-4">
<label class="form-label">Unit Price</label>
<div class="input-group">
<span class="input-group-text bg-transparent border-end-0 text-muted">$</span>
<input class="form-control border-start-0" placeholder="0.00" type="number"/>
</div>
</div>
<div class="col-md-4">
<label class="form-label">Other Price</label>
<div class="input-group">
<span class="input-group-text bg-transparent border-end-0 text-muted">$</span>
<input class="form-control border-start-0" placeholder="0.00" type="number"/>
</div>
</div>
<div class="col-md-4">
<label class="form-label">Unit of Measure</label>
<select class="form-select">
<option>PCS</option>
<option>UNIT</option>
<option>PAIR</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
<!-- Product Photo Card -->
<div class="card-custom">
<h3 class="card-title mb-4">Product Photo</h3>
<div class="upload-area" id="dropZone">
<span class="material-symbols-outlined upload-icon">cloud_upload</span>
<p class="fw-bold mb-1" style="font-size: 0.875rem;">Drag &amp; drop your file here</p>
<p class="text-muted small mb-3">or <span style="color: var(--primary-color); text-decoration: underline;">browse files</span></p>
<p class="text-uppercase fw-bold text-muted mb-0" style="font-size: 9px; letter-spacing: 0.1em;">Supports: JPG, PNG, WEBP (Max 5MB)</p>
<input hidden="" id="fileInput" type="file"/>
</div>
<div class="upload-thumbnails">
<div class="thumb-box">
<span class="material-symbols-outlined">image</span>
</div>
<div class="thumb-box">
<span class="material-symbols-outlined">image</span>
</div>
<div class="thumb-box thumb-add" style="cursor: pointer;">
<span class="material-symbols-outlined fs-5">add</span>
</div>
</div>
</div>
<!-- Pro Tip Card -->
<div class="pro-tip">
<div class="pro-tip-title">
<span class="material-symbols-outlined fs-6">info</span>
                            Pro Tip
                        </div>
<p class="pro-tip-text">
                            Detailed descriptions and clear photos increase sales conversion by up to 40%. Make sure to include all technical specifications.
                        </p>
</div>
</div>
</div>
<!-- Mobile Buttons -->
<div class="d-md-none d-flex flex-column gap-3 mt-4">
<button class="btn btn-primary-custom w-100 py-3" type="button">Save Product</button>
<button class="btn btn-cancel w-100 py-3" type="button">Cancel</button>
</div>
</div>
</div>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Vanilla JavaScript for basic interactions -->
<script>
        document.addEventListener('DOMContentLoaded', () => {
            const dropZone = document.getElementById('dropZone');
            const fileInput = document.getElementById('fileInput');
            const saveBtn = document.getElementById('saveProductBtn');

            // Trigger file input on drop zone click
            dropZone.addEventListener('click', () => {
                fileInput.click();
            });

            // Handle file selection
            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    console.log('File selected:', e.target.files[0].name);
                    alert('File "' + e.target.files[0].name + '" ready for upload.');
                }
            });

            // Drag and drop visual feedback
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.style.borderColor = 'var(--primary-color)';
                dropZone.style.backgroundColor = 'rgba(236, 91, 19, 0.05)';
            });

            dropZone.addEventListener('dragleave', () => {
                dropZone.style.borderColor = '#cbd5e1';
                dropZone.style.backgroundColor = '#f8fafc';
            });

            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.style.borderColor = '#cbd5e1';
                dropZone.style.backgroundColor = '#f8fafc';
                if (e.dataTransfer.files.length > 0) {
                    console.log('File dropped:', e.dataTransfer.files[0].name);
                    alert('File "' + e.dataTransfer.files[0].name + '" dropped.');
                }
            });

            // Save button interaction
            saveBtn.addEventListener('click', () => {
                saveBtn.disabled = true;
                saveBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
                
                // Simulate saving delay
                setTimeout(() => {
                    alert('Product saved successfully!');
                    saveBtn.disabled = false;
                    saveBtn.innerHTML = 'Save Product';
                }, 1500);
            });
        });
    </script>
</body></html>