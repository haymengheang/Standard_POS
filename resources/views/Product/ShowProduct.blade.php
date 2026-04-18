@extends('Main')
@section('content')
<main class="main-wrapper">
<!-- Header Section -->
      <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h1 class="h3 fw-bold mb-1">Products</h1>
                <p class="text-muted mb-0">Manage your catalog and stock levels</p>
            </div>
            <a href="{{Route('Show.SaveProduct')}}" class="btn btn-orange">
                <i class="bi bi-plus-lg me-2"></i>Add New Product
            </a>
      </div>
<!-- BEGIN: Filters Card -->
      <section class="card mb-4" data-purpose="filter-bar">
            <div class="card-body">
                  <div class="row g-3 align-items-center">
                        <div class="col-lg-4">
                              <div class="input-group">
                                   <span class="input-group-text bg-light border-end-0"><i class="bi bi-search"></i></span>
                                   <input class="form-control bg-light border-start-0" placeholder="Search by ID, name or category..." type="text"/>
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
                        <tbody>
                        @foreach ($products as $product)
                              <tr>
                                   <td class="fw-medium text-primary">{{$product->productid}}</td>
                                   <td><strong>{{$product->productname}}</strong></td>
                                   <td class="text-muted">{{$product->productname2}}</td>
                                   <td class="fw-bold">{{$product->price}}$</td>
                                   <td class="text-muted">{{$product->other_price}}$</td>
                                   <td>{{$product->unit_of_measure}}</td>
                                   <td><span class="badge bg-light text-dark border">{{$product->product_line}}</span></td>
                                   <td><img alt="Safety Helmet" class="product-img" src="{{ asset('uploads/'. ($product->image ? $product->image : 'no-image.png')) }}"/></td>
                                   <td class="text-center">
                                    <a href="{{ route('products.edit',$product->productid) }}" class="btn btn-sm btn-outline-secondary">
                                          <i class="bi bi-eye"></i> View
                                    </a>
                                    <form action="{{ route('products.destroy',$product->productid) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            {{-- onclick="return confirm('Are you sure you want to delete this product?')"> --}}
                                            <i class="bi bi-trash-fill"></i> Delete
                                        </button>
                                    </form>
                                   </td>
                              </tr>
                         @endforeach
                        </tbody>
                  </table>
            </div>
            <!-- BEGIN: Pagination -->
            <div class="card-footer bg-white border-top py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <span class="text-muted small">Showing {{$products->firstItem()}} to {{$products->lastItem()}} of {{$products->total()}} products</span>
                  {{ $products->links() }}
                  {{-- <nav aria-label="Product pagination">
                      <ul class="pagination pagination-sm mb-0">
                           <li class="page-item disabled">
                             <a class="page-link" href="" tabindex="-1">Previous</a>
                           </li>
                           <li class="page-item active"><a class="page-link" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item">
                           <a class="page-link" href="#">Next</a>
                           </li>
                      </ul>
                  </nav> --}}
                </div>
            </div>
            <!-- END: Pagination -->
      </section>
      <!-- END: Products Table -->
</main> 
@endsection