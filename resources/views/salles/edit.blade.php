@extends('adminlte::page')

@section('content')
<h1 class="display-6">Edit Salle</h1>

<hr/>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <form method="POST" action="http://127.0.0.1:8000/admin/salles/1" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="ftuwFLP9YjZbOHNR5eIWl38JQjtvQt6RXI2HqKwi">
      <input name="_token" type="hidden" value="ftuwFLP9YjZbOHNR5eIWl38JQjtvQt6RXI2HqKwi">
      <div class="form-group">
        <label for="name">Salle Name</label>
        <input class="form-control select2" name="name" type="text" value="{{old('name',$salle->name)}}" id="name">
      </div>
      <div class="form-group">
        <label for="adresse">Salle Adresse</label>
        <input class="form-control" name="adresse" type="text" value="{{old('adresse',$salle->adresse)}}" id="adresse">
      </div>
      <br>
      <input class="btn btn-primary" type="submit" value="Update!">
      </form>
          </div>
      </div>
@endsection
