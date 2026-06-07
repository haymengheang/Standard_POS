@extends('Main')
<script>
    const productUrl = "{{ route('show.SaveUnitofMeasure') }}";
</script>

@section('content')

<main class="main-wrapper">
<!-- Header Section -->
      {{-- <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h1 class="h3 fw-bold mb-1">Products</h1>
                <p class="text-muted mb-0">Manage your catalog and stock levels</p>
            </div>
            <a href="{{Route('Show.SaveProduct')}}" class="btn btn-orange">
                <i class="bi bi-plus-lg me-2"></i>Add New Product
            </a>

            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </div>
</div> --}}


<div class="d-flex justify-content-between align-items-end mb-4">

    <!-- LEFT -->
    <div>
        <h1 class="h3 fw-bold mb-1">Products</h1>
        <p class="text-muted mb-0">
            Manage your catalog and stock levels
        </p>
    </div>

    <!-- RIGHT -->
    <div class="d-flex align-items-center gap-2">
      <!-- ADD BUTTON -->
        <a href="{{ Route('Show.SaveProduct') }}"
           class="btn btn-orange">

            <i class="bi bi-plus-lg me-2"></i>
            Add New Product

        </a>
        <!-- DROPDOWN -->
        <div class="dropdown">
            <button class="btn dropdown-toggle px-4 py-2" style="background-color: #fe6b02; color:white"
                    type="button"
                    id="dropdownMenuButton"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa fa-download me-2"></i>
                Action
            </button>
            <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item upload-excel-btn" href="#">
                      <i class="fa-solid fa-upload me-2" style="color: rgb(90, 89, 89);"></i>  Upload Excel
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('Product.ImportExcel') }}">
                     <i class="fa-solid fa-file-excel fa-lg me-2" style="color: rgb(81, 198, 118);"></i> Export Excel
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('Product.ExportPDF') }}">
                       <i class="fa-solid fa-file-pdf fa-lg me-2" style="color: rgb(234, 87, 87);"></i> Export PDF
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- BEGIN: Filters Card -->
      <section class="card mb-4" data-purpose="filter-bar">
            <div class="card-body">
                  <div class="row g-3 align-items-center">
                        <div class="col-lg-4">
                              <div class="input-group">
                                   <span class="input-group-text bg-light border-end-0"><i class="bi bi-search"></i></span>
                                   <input id="search" name="search" class="form-control bg-light border-start-0" placeholder="Search by ID, name or category..." type="text"/>
                              </div>
                        </div>
                        <div class="col-md-2">
                             <select id="category" name='category' class="form-select bg-light border-0" data-purpose="filter-category">
                                    <option selected="" value="" {{ request('category')=='' ? 'selected' : '' }}>Category</option>
                                    @foreach ($categories as $cat)
                                          <option value="{{ $cat->productlineid }}" {{ request('category')==$cat->productlineid ? 'selected' : '' }}>
                                               {{ $cat->productlineid }}
                                          </option>
                                    @endforeach
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
                              <select class="form-select bg-light border-0" data-purpose="filter-price">
                                    <option selected="">Price Range</option>
                                    <option>$0 - $50</option>
                                    <option>$50 - $200</option>
                                    <option>$200+</option>
                              </select>
                        </div>
                              <div class="col-md-2">
                              <select class="form-select bg-light border-0" id="exportOption" data-purpose="filter-stock">
                                    <option selected="" class="bi bi-search">Action Download</i></option>
                                   <option value="{{ route('Product.ImportExcel') }}">Export Excel </option>
                                    <option value='upload'>Upload Excel</option>
                                    <option value="{{ route('Product.ExportPDF') }}">Download PDF</option>
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
                                  <th>Product ID</th>
                                  <th>Description</th>
                                  <th>Specs / Note</th>
                                  <th>Unit Price</th>
                                  <th>Other Price</th>
                                  <th>UOM</th>
                                  <th>Product Line</th>
                                  <th>Photo</th>
                                  <th class="text-center">Action</th>
                              </tr>
                        </thead>
                        <tbody id="productTable">
                               @include('Product.SearchPartials', ['products' => $products])
                        </tbody>
                  </table>
            </div>
            <!-- BEGIN: Pagination -->
           <div id="paginationArea" class="card-footer bg-white border-top py-3">
                  <div class="d-flex align-items-center justify-content-between">
                        <span class="text-muted small">
                            Showing {{$products->firstItem()}} to {{$products->lastItem()}} of {{$products->total()}} products
                        </span>
                        {{ $products->links() }}
                  </div>
            </div>
            <!-- END: Pagination -->
      </section>
      <!-- END: Products Table -->

      <!-- Models Pupup -->
      <div class="modal fade"
            id="uploadExcelModal"
            tabindex="-1">
            <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div style="background-color: #fe6b02" class="modal-header  text-white">
                              <h5 class="modal-title">
                                    Upload Excel File
                              </h5>
                              <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ Route('product.import') }}"method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                              <!-- NOTE -->
                              <div class="alert alert-info">
                                    <h5>Note</h5>
                                    Please select Excel file to upload.
                              </div>
                              @if(session('error'))
                              <div class="alert alert-danger alert-dismissible fade show">
                                    {!! nl2br(e(session('error'))) !!}
                                    <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="alert">
                                    </button>
                              </div>
                              @endif
                              @if($errors->has('file'))
                              <div class="alert alert-danger alert-dismissible fade show">
                                    {{ $errors->first('file') }}
                                    <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="alert">
                                    </button>
                              </div>
                              @endif
                              <!-- FILE -->
                              <div class="mb-3">
                                    <label class="form-label"> Select File </label>
                                    <input type="file" name="file" class="form-control">
                              </div>
                              <!-- WARNING -->
                              {{-- <div class="alert alert-warning">
                                    <h5>Warning</h5>
                                    Existing product IDs may be updated.
                              </div> --}}
                               @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}
                                    <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="alert">
                                    </button>
                                </div>
                                @endif
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-danger px-4 py-2" data-bs-dismiss="modal">
                                    Close
                              </button>
                              <button type="submit" style="background-color: #fe6b02" class="btn px-4 py-2 text-white">
                                    Upload Excel
                              </button>
                        </div>
                        </form>
                  </div>
            </div>
            </div>
      <!-- End Models -->

</main>
@if(session('error') || session('success') || $errors->has('file'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    let uploadModal = new bootstrap.Modal(
        document.getElementById('uploadExcelModal')
    );

    uploadModal.show();
});
</script>
@endif
<script src="{{ asset('assets/JS/CreateIeam.js') }}"></script>
@endsection
