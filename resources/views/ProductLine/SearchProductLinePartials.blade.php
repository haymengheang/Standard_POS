  @foreach ($productline as $productlines)
    <tr>
         <td class="fw-medium text-primary">{{$productlines->productlineid}}</td>
         <td><strong>{{$productlines->productlinename}}</strong></td>
         <td class="text-muted">{{$productlines->productlinename2}}</td>
         <td class="fw-bold">{{$productlines->noted}}$</td>
         <td class="text-muted">{{$productlines->disc}}$</td>
         <td class="text-muted">{{$productlines->disc_percentage}}%</td>
         <td><img alt="Safety Helmet" class="product-img" src="{{ asset('uploads/'. ($productlines->picture ? $productlines->picture : 'no-image.png')) }}"/></td>
         <td class="text-center">
          <a href="{{ route('productsLine.edit',$productlines->productlineid) }}" class="btn btn-sm btn-outline-secondary">
              <i class="bi bi-eye"></i> View
          </a>
          <form action="{{ route('productsLine.destroy',$productlines->productlineid) }}" method="POST" style="display:inline;">
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