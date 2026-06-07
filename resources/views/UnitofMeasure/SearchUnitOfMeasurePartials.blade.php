  @foreach ($UnitOfMeasure as $UnitOfMeasures)
    <tr>
         <td class="fw-medium text-primary">{{$UnitOfMeasures->umid}}</td>
         <td><strong>{{$UnitOfMeasures->umname}}</strong></td>
         <td class="text-muted">{{$UnitOfMeasures->umname2}}</td>
         <td class="fw-bold">{{$UnitOfMeasures->note}}</td>
         <td class="text-muted">{{$UnitOfMeasures->factor}}</td>
         <td class="text-center">
          <a href="{{ route('unitofMeasure.edit',$UnitOfMeasures->umid) }}" class="btn btn-sm btn-outline-secondary">
              <i class="bi bi-eye"></i> View
          </a>
          <form action="{{ route('unitofMeasure.destroy',$UnitOfMeasures->umid) }}" method="POST" style="display:inline;">
              <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confrimDelete">
                  <i class="bi bi-trash-fill"></i> Delete
              </button>
          </form>
         </td>
    </tr>

    <!-- Modal Confrim delete Unit of Measure-->
    <div class="modal fade" id="confrimDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Unit Of Mesure</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this unit of measure ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form  action="{{ route('unitofMeasure.destroy',$UnitOfMeasures->umid) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

        </div>
        </div>
    </div>
    </div>
  @endforeach
