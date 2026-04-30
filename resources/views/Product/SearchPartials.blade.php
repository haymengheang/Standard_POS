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
            <i class="bi bi-eye"></i> View
        </a>

        <form action="{{ route('products.destroy',$product->productid) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-trash-fill"></i> Delete
            </button>
        </form>
    </td>
</tr>
@endforeach