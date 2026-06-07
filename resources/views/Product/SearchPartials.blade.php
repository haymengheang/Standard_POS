@foreach ($products as $product)
<tr>
    <td class="fw-medium text-primary">{{ $product->productid }}</td>
    <td><strong>{{ $product->productname }}</strong></td>
    <td class="text-muted">{{ $product->productname2 }}</td>
    <td class="fw-bold">{{ $product->price }}$</td>
    <td class="text-muted">{{ $product->other_price }}$</td>
    <td>{{ $product->unit_of_measure }}</td>
    <td>
        <span class="badge bg-light text-dark border">
            {{ $product->product_line }}
        </span>
    </td>
    <td>
        <img class="product-img"
             src="{{ asset('uploads/' . ($product->image ?? 'no-image.png')) }}">
    </td>
    <td class="text-center">
        <a href="{{ route('products.edit',$product->productid) }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-eye"></i> {{ __('messages.view') }}
        </a>
        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confrimDelete">
            <i class="bi bi-trash-fill"></i> {{ __('messages.delete') }}
        </button>
    </td>
</tr>
<!-- Modal Confrim delete Product-->
    <div class="modal fade" id="confrimDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this product ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form  action="{{ route('products.destroy',$product->productid) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('messages.delete') }}</button>
            </form>

        </div>
        </div>
    </div>
    </div>
@endforeach
