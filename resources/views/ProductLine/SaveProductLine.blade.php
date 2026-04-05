@extends('Main')
<link rel="stylesheet" href="{{ asset('assets/CreateItem/Stayle.css') }}">
<script src="{{ asset('assets/JS/CreateIeam.js') }}"></script>
@section('content')
    {{-- <main class="container-xl pb-5" style="max-width: 1920cm;"> --}}
        <main class="main-wrapper" >
        <header class="row align-items-end mb-4 g-3">
                <div class="col">
                    <div>
                     <h1 class="h3 fw-bold mb-1">Products Line</h1>
                     <p class="text-muted mb-0">Manage your catalog and stock levels</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex gap-2">
                        <a href="{{Route('Show.ProductLine')}}">
                            <button class="btn btn-outline-dark" style="height: 45px;">Cancel</button>
                        </a>
                        <button form="FormProduct" type="submit" class="btn btn-orange d-flex align-items-center gap-2">
                        <span class="material-icons-round" style="font-size: 1.1rem;">save</span>
                            Save Products Line
                        </button>
                    </div>
                </div>
            </header>
        {{-- <form id="FormProduct" action="{{route('Save.Data')}}" method="POST" enctype="multipart/form-data"> --}}
            <form id="FormProductline" action="{{ isset($product) ? route('products.update',$product->productid) : route('Save.ProductLine') }}" method="POST" enctype="multipart/form-data">
            @if(isset($product))
            @method('PUT')
            @endif
            @csrf
            <div class="row g-6">
        <!-- Main Form Column -->
            <div class="col-lg-8" >
                <div class="card">
                    <div class="row g-8 " >
                        <div class="col-12">
                            <label class="form-label" for="productLine_id">Products Line ID</label>
                            <div class="input-group-custom">
                                <span class="material-icons-round">qr_code</span>
                                <input required value="{{$product->productid ?? ''}}"  name="productsLineid" style="text-transform: uppercase;" class="form-control" id="product_id" placeholder="e.g. SKU-10293" type="text"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description">Description</label>
                            <input class="form-control" value="{{$product->productname ?? ''}}" name="productsLinename" id="description" placeholder="Main item description" type="text"/>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description">Description</label>
                            <input class="form-control" value="{{$product->productname ?? ''}}" name="productsLinename2" id="description" placeholder="Main item description" type="text"/>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="discountAmount" >Discount Amount</label>
                            <div  class="input-group-custom price-input">
                                <span class="currency-symbol">$</span>
                                <input required class="form-control" value="{{$product->price ?? ''}}" name="discAmount" id="price" placeholder="0.00" step="0.01" type="number"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="discountPercentage" >Discount Percentage</label>
                            <div  class="input-group-custom price-input">
                                <span class="currency-symbol">$</span>
                                <input required class="form-control" value="{{$product->price ?? ''}}" name="discPercentage" id="price" placeholder="0.00" step="0.01" type="number"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description2">Additional Description</label>
                            <textarea class="form-control" name="Noted" id="description2" placeholder="Specs, materials, or technical details..." rows="8">{{$product->productname2 ?? ''}}</textarea>
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
                        <div class="upload-area" style="padding: 1rem; min-height: 150px; display: flex; align-items: center; justify-content: center; cursor: default;">
                            <div class="position-relative w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                @if(!empty($product->image))
                            
                                     <img onclick="document.getElementById('inputfile').click()" id="previewImage" alt="Product Preview" class="img-fluid rounded mb-2" src="{{asset('uploads/'.$product->image)}}" style="max-height: 160px; object-fit: contain;"/>
                                @else
                                    
                         <img onclick="document.getElementById('inputfile').click()" id="previewImage" alt="Product Preview" class="img-fluid rounded mb-2" src="{{asset('icon/no_images.png')}}" style="max-height: 160px; object-fit: contain;"/>
                                @endif
                               
                                <div class="d-flex gap-2 mt-2">
                                    <input name="image" id="inputfile"  class="form-control border d-flex align-items-center gap-1 shadow-sm" onchange="PreviewFile(event)" type="file">
                                </div>
                            </div>
                        </div>
                </div>
        <!-- Status Card -->
                <div class="card">
                    <h6 class="text-uppercase fw-bold small mb-4 text-secondary" style="letter-spacing: 0.05em;">Publication Status</h6>
                    <div class="form-check mb-2">
                        <input checked="" value="1" class="form-check-input" id="statusActive" {{ ($product->action ?? '') == '1' ? 'checked' : '' }} name="status" type="radio"/>
                        <label class="form-check-label small" for="statusActive">Active</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="0" id="statusDraft" {{ ($product->action ?? '') == '0' ? 'checked' : '' }} name="status" type="radio"/>
                        <label  class="form-check-label small" for="statusDraft">Inactive </label>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </main>
@endsection
