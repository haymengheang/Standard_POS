@extends('Main')
<script>
    const productUrl = "{{ route('Show.ProductLine') }}";
</script>

@section('content')
    <main class="main-wrapper">
<!-- Header Section -->
      <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h1 class="h3 fw-bold mb-1">Product Line</h1>
                <p class="text-muted mb-0">Manage your catalog and stock levels</p>
            </div>
            <a href="{{Route('Show.ProductLineEdit')}}" class="btn btn-orange">
                <i class="bi bi-plus-lg me-2"></i>Add New Product Line
            </a>
      </div>
<!-- BEGIN: Filters Card -->
      <section class="card mb-4" data-purpose="filter-bar">
            <div class="card-body">
                  <div class="row g-3 align-items-center">
                        <div class="col-lg-4">
                              <div class="input-group">
                                   <span class="input-group-text bg-light border-end-0"><i class="bi bi-search"></i></span>
                                   <input class="form-control bg-light border-start-0" name="search" id="search" placeholder="Search by ID, name or category..." type="text"/>
                              </div>
                        </div>
                        <div class="col-md-2">
                             <select class="form-select bg-light border-0" data-purpose="filter-category">
                                    <option selected="">Category</option>
                                    <option>Power Tools</option>
                                    <option>Hardware</option>
                                    <option>Safety Gear</option>
                             </select>
                        </div>
                        <div class="col-md-2">
                              <select class="form-select bg-light border-0" data-purpose="filter-stock">
                                    <option selected="">Stock Status</option>
                                    <option>In Stock</option>
                                    <option>Low Stock</option>
                                    <option>Out of Stock</option>
                              </select>
                        </div>
                        <div class="col-md-2">
                              <select class="form-select bg-light border-0" data-purpose="filter-price">
                                    <option selected="">Price Range</option>
                                    <option>$0 - $50</option>
                                    <option>$50 - $200</option>
                                    <option>$200+</option>
                              </select>
                        </div>
                        <div class="col-md-2">
                              <select class="form-select bg-light border-0" data-purpose="filter-supplier">
                                    <option selected="">Supplier</option>
                                    <option>Titan Ind.</option>
                                    <option>Global Tools</option>
                              </select>
                        </div>
                  </div>
                  <div class="mt-3">
                  <a class="text-decoration-none small text-muted hover-primary" href="#" id="clear-filters">
                  <i class="bi bi-x-circle me-1"></i>Clear all filters
                            </a>
                  </div>
            </div>
      </section>
      <!-- END: Filters Card -->
      <!-- BEGIN: Products Table -->
      <section class="card overflow-hidden">
            <div class="table-responsive">
                  <table class="table table-hover mb-0" id="product-list-table">
                        <thead>
                              <tr>
                                  <th>ProductLine ID</th>
                                  <th>Description</th>
                                  <th>Description</th>
                                  <th>Specs / Note</th>
                                  <th>Discount($)</th>
                                  <th>Discount(%)</th>
                                  <th>Photo</th>
                                  <th class="text-center">Action</th>
                              </tr>
                        </thead>
                        <tbody id="productlineTable">
                           @include('ProductLine.SearchProductLinePartials',['productline'=>$productline]);
                        </tbody>
                  </table>
            </div>
            <!-- BEGIN: Pagination -->
            <div  id="paginationArea"  class="card-footer bg-white border-top py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <span class="text-muted small">Showing {{$productline->firstItem()}} to {{$productline->lastItem()}} of {{$productline->total()}} products</span>
                  {{ $productline->links() }}
                </div>
            </div>
            <!-- END: Pagination -->
      </section>
      <!-- END: Products Table -->
      <script src="{{ asset('assets/JS/Productline.js') }}"></script>
</main> 
@endsection