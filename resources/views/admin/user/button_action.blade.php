<a href="{{route('users.edit', $id)}}" id="modal-show" title="edit" class="btn  btn-primary btn-flat btn-sm edit" ><i class="far fa-edit"></i></a>
{{-- <form action="{{route('users.delete', ['id'=>$id])}}"
      onsubmit="return confirm('Are you sure?')" class="d-inline"
      method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE"> --}}
    {{-- <button type="submit" class="btn  btn-danger btn-flat btn-sm btn-delete"  title="{{$model->name}}"><i class="far fa-trash-alt"></i></button> --}}
{{-- </form> --}}
<a href="{{route('users.delete', ['id'=>$id])}}" class="btn  btn-danger btn-flat btn-sm btn-delete"  title="{{$model->name}}"><i class="far fa-trash-alt"></i></a>