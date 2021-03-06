@extends('adminlte::page')
@section('content')
<h2 class="display-6">Seances list</h2>
<hr/>
  <div class="row">
    <div class="col-md-12 col-md-offset-1">
      <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
          <th>Seance Id</th>
          <th>Seance Jour</th>
          <th>Seance Start</th>
          <th>Seance End</th>
          <th>Coach</th>
          <th>Salle</th>
        </thead>
        <tbody>
        @foreach($seances as $seance)
        <tr>
          <td>{{$seance->id}}</td>
          <td>{{$seance->weekday}}</td>
          <td>{{$seance->start_time}}</td>
          <td>{{$seance->end_time}}</td>
          <td>{{$seance->coach->name}}</td>
          <td>{{$seance->salle->name}}</td>
          </td>
        </tr>
        @endforeach
          @foreach($demandes as $demande)
          <tr>
            <td>{{$demande->seance->id}}</td>
            <td>{{$demande->seance->weekday}}</td>
            <td>{{$demande->seance->start_time}}</td>
            <td>{{$demande->seance->end_time}}</td>
            <td>{{$demande->seance->coach->name}}</td>
            <td>{{$demande->seance->salle->name}}</td>
          </tr>
          @endforeach

      </tbody>

      </table>
    </div>
  </div>

@endsection
