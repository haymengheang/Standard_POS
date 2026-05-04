  @foreach ($UnitOfMeasure as $UnitOfMeasures)
    <tr>
         <td class="fw-medium text-primary">{{$UnitOfMeasures->umid}}</td>
         <td><strong>{{$UnitOfMeasures->umname}}</strong></td>
         <td class="text-muted">{{$UnitOfMeasures->umname2}}</td>
         <td class="fw-bold">{{$UnitOfMeasures->note}}</td>
         <td class="text-muted">{{$UnitOfMeasures->factor}}</td>
         <td class="text-center">
          <a href="{{ route('productsLine.edit',$UnitOfMeasures->umid) }}" class="btn btn-sm btn-outline-secondary">
              <i class="bi bi-eye"></i> View
          </a>
          <form action="{{ route('productsLine.destroy',$UnitOfMeasures->umid) }}" method="POST" style="display:inline;">
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