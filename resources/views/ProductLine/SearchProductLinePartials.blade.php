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
              <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confrimDelete">
                  <i class="bi bi-trash-fill"></i> Delete
              </button>
         </td>
    </tr>
    <!-- Modal Confrim delete Product Line-->
    <div class="modal fade" id="confrimDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Product Line</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this product line ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="{{ route('productsLine.destroy',$productlines->productlineid) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

        </div>
        </div>
    </div>
    </div>
  @endforeach
