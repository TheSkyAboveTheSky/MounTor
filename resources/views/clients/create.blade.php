@extends('adminlte::page')
@section('content')
<h1 class="display-6">Create New Client</h1>

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
    <!-- Open the form with the store function route. -->
    {{ Form::open(['action' => 'ClientController@store']) }}

    <!-- Include the CRSF token -->
    {{Form::token()}}

    
    <!-- build our form inputs -->
    <div class="form-group">
      {{Form::label('name', 'Client Name')}}
      {{Form::text('name', '', ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('salle_id', 'Client Salle')}}
      {{Form::number('salle_id', '', ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('duree_abonement_in_months', 'Client duree_abonement_in_months')}}
      {{Form::number('duree_abonement_in_months', '', ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('email', 'Client Email')}}
      {{Form::email('email', '', ['class' => 'form-control'])}}
    </div>
    {{Form::submit('Create!', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
@endsection