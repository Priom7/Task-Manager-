@extends('layouts.app')
@section('content')
<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
  <div class="card">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-boxes"></i> Assets</h5>
        <a href="/projects/create" class="btn btn-primary btn-sm my-2"><i class="fas fa-plus-circle"></i> Request Assets</a>
      </div>
      <ul class="list-group list-group-flush">
       

         @foreach($users->projects as $project)
            <li class="list-group-item"><a href="/projects/{{$project->id}}"><i class="fas fa-boxes"></i> {{$project->name}}</a></li>
         @endforeach 

      </ul>
  </div>
</div>


 @foreach($projects as $project)
            <li class="list-group-item"><a href="/projects/{{$project->id}}"><i class="fas fa-boxes"></i> {{$project->name}}</a></li>
         @endforeach 

@endsection
