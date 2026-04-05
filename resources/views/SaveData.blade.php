<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Create New Item - Inventory Management</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<!-- Google Fonts & Material Icons -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('assets/CreateItem/Stayle.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/JS/CreateIeam.js') }}"></script>
</head>
<body>
    <nav class="navbar mb-5">
        <div class="container-xl d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <div class="brand-icon">
                    <span class="material-icons-round">inventory_2</span>
                </div>
                    <span class="h5 mb-0 fw-bold">InvManager</span>
            </div>
        <div class="d-flex align-items-center gap-3">
            <div class="mode-toggle" onclick="document.body.classList.toggle('dark-mode')">
                <span class="material-icons-round">dark_mode</span>
            </div>
                <div class="avatar">JD</div>
            </div>
        </div>
    </nav>
    <main class="container-lg pb-5" style="max-width: 1024px;">
        <header class="row align-items-end mb-4 g-3">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1" style="font-size: 0.875rem;">
                            <li class="breadcrumb-item"><a href="#">Inventory</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Create New Item</li>
                        </ol>
                    </nav>
                    <h1 class="h2 fw-bold mb-0">Create New Item</h1>
                </div>
                <div class="col-auto">
                    <div class="d-flex gap-2">
                        <a href="{{ route('Main.Home') }}">
                            <button class="btn btn-outline-secondary">Cancel</button>
                        </a>
                        <button form="FormProduct" type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                        <span class="material-icons-round" style="font-size: 1.1rem;">save</span>
                            Save Item
                        </button>
                    </div>
                </div>
            </header>
        <form id="FormProduct" action="{{route('Save.Data')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
        <!-- Main Form Column -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label" for="product_id">Product ID</label>
                            <div class="input-group-custom">
                                <span class="material-icons-round">qr_code</span>
                                <input required  name="PRODUCTID" style="text-transform: uppercase;" class="form-control" id="product_id" placeholder="e.g. SKU-10293" type="text"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description">Description</label>
                            <input class="form-control" name="PRODUCTNAME" id="description" placeholder="Main item description" type="text"/>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description2">Additional Description</label>
                            <textarea class="form-control" name="PRODUCTNAME2" id="description2" placeholder="Specs, materials, or technical details..." rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="price" >Unit Price</label>
                            <div  class="input-group-custom price-input">
                                <span class="currency-symbol">$</span>
                                <input required class="form-control"  name="PRICE" id="price" placeholder="0.00" step="0.01" type="number"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="price">Wholse Price</label>
                            <div class="input-group-custom price-input">
                                <span class="currency-symbol">$</span>
                                <input required class="form-control"  name="OTHER_PRICE" id="price" placeholder="0.00" step="0.01" type="number"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="measure_code">Unit of Measure Code</label>
                            <select required name="UNIT_OF_MEASURE" class="form-select" id="measure_code">
                                <option selected="" value="">Select Code</option>
                                <option value="PCS">PCS - Pieces</option>
                                <option value="KG">KG - Kilograms</option>
                                <option value="BOX">BOX - Boxes</option>
                                <option value="SET">SET - Sets</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label" for="measure_code">Product Line</label>
                            <select required name="PRODUCT_LINE" class="form-select" id="measure_code">
                                <option selected="" value="">Select Code</option>
                                <option value="PCS">PCS - Pieces</option>
                                <option value="KG">KG - Kilograms</option>
                                <option value="BOX">BOX - Boxes</option>
                                <option value="SET">SET - Sets</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Sidebar Column -->
            <div class="col-lg-4">
        <!-- Image Upload Card -->
                <div class="card mb-4">
                    <div class="mb-3">
                        <label class="form-label d-block mb-1">Product Photo</label>
                        <span class="text-secondary small">PNG, JPG, or WEBP. Max 5MB.</span>
                    </div>
                        <div class="upload-area" style="padding: 1rem; min-height: 260px; display: flex; align-items: center; justify-content: center; cursor: default;">
                            <div class="position-relative w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                <img onclick="document.getElementById('inputfile').click()" id="previewImage" alt="Product Preview" class="img-fluid rounded mb-2" src="{{asset('icon/no_images.png')}}" style="max-height: 160px; object-fit: contain;"/>
                                <div class="d-flex gap-2 mt-2">
                                    <input name="image" id="inputfile"  class="form-control border d-flex align-items-center gap-1 shadow-sm" onchange="PreviewFile(event)" type="file">
                                </div>
                            </div>
                        </div>
                </div>
        <!-- Status Card -->
                <div class="card">
                    <h6 class="text-uppercase fw-bold small mb-4 text-secondary" style="letter-spacing: 0.05em;">Publication Status</h6>
                    <div class="form-check mb-3">
                        <input checked="" value="1" class="form-check-input" id="statusActive" name="status" type="radio"/>
                        <label class="form-check-label small" for="statusActive">Active</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="0" id="statusDraft" name="status" type="radio"/>
                        <label  class="form-check-label small" for="statusDraft">Inactive </label>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </main>
        <footer class="container-xl py-5 mt-4 border-top">
            <p class="text-center text-secondary small">© 2023 Inventory Management System. All rights reserved.</p>
        </footer>
    </body>
</html>