@extends('Main')
<link rel="stylesheet" href="{{ asset('assets/CreateItem/Stayle.css') }}">
@section('content')

        <main class="main-wrapper" >
        <header class="row align-items-end mb-4 g-3">
                <div class="col">
                    <div>
                     <h1 class="h3 fw-bold mb-1">Unit of Measure</h1>
                     <p class="text-muted mb-0">Manage your Unit of Measure and stock levels</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex gap-2">
                        <a href="{{Route('Show.Unitofmeasure')}}">
                            <button class="btn btn-outline-dark" style="height: 45px;">Cancel</button>
                        </a>
                        <button form="FormProductline" type="submit" class="btn btn-orange d-flex align-items-center gap-2">
                        <span class="material-icons-round" style="font-size: 1.1rem;">save</span>
                            Save Unit of Measure
                        </button>
                    </div>
                </div>
            </header>
        {{-- <form id="FormProduct" action="{{route('Save.Data')}}" method="POST" enctype="multipart/form-data"> --}}
            <form id="FormProductline" action="{{ isset($productline) ? route('productsLine.update',$productline->productlineid) : route('show.SaveUnitofMeasure') }}" method="POST" enctype="multipart/form-data">
            @if(isset($productline))
            @method('PUT')
            @endif
            @csrf
            <div class="row g-6">
                      @if(session('success'))
                    <div class="alert alert-success">
                       Data saved successfully
                    </div>
                @endif

        <!-- Main Form Column -->
            <div class="col-lg-8" >
                <div class="card">
                    <div class="row g-8 " >
                        <div class="col-12">
                            <label class="form-label" for="productLine_id">Unit of Measure ID</label>
                            <div class="input-group-custom">
                                <span class="material-icons-round">qr_code</span>
                                <input required value="{{$productline->productlineid ?? ''}}"  name="umid" style="text-transform: uppercase;" class="form-control" id="product_id" placeholder="e.g. SKU-10293" type="text"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description">Description</label>
                            <input class="form-control" value="{{$productline->productlinename ?? ''}}" name="umname" id="description" placeholder="Main item description" type="text"/>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description">Description</label>
                            <input class="form-control" value="{{$productline->productlinename2 ?? ''}}" name="umname2" id="description" placeholder="Main item description" type="text"/>
                        </div>
                       <div class="col-3">
                            <label class="form-label" for="description">Factor</label>
                            <input class="form-control" value="{{$productline->productlinename2 ?? ''}}" name="factor" id="description" placeholder="0" type="number"/>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description2">Additional Description</label>
                            <textarea class="form-control" name="Noted" id="description2" placeholder="Specs, materials, or technical details..." rows="8">{{$productline->noted ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Sidebar Column -->
            <div class="col-lg-4">
        <!-- Image Upload Card -->
        <!-- Status Card -->
                <div class="card">
                    <h6 class="text-uppercase fw-bold small mb-4 text-secondary" style="letter-spacing: 0.05em;">Publication Status</h6>
                    <div class="form-check mb-2">
                        <input checked="" value="1" class="form-check-input" id="statusActive" {{ ($productline->active ?? '') == '1' ? 'checked' : '' }} name="status" type="radio"/>
                        <label class="form-check-label small" for="statusActive">Active</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="0" id="statusDraft" {{ ($productline->active ?? '') == '0' ? 'checked' : '' }} name="status" type="radio"/>
                        <label  class="form-check-label small" for="statusDraft">Inactive </label>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </main>
@endsection