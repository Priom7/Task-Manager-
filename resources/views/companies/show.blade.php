@extends('layouts.app')
@section('content')
<div class="col-md-12 col-lg-12 col-sm-12">
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><i class="fas fa-people-carry"></i> {{$company->name}}</h1>
      <p class="lead text-muted">{{$company->description}}</p>
      <p>
        <a href="/companies/{{ $company->id }}/edit" class="btn btn-primary my-2"><i class="fas fa-edit"></i> Edit</a>
        <a href="/projects/create" class="btn btn-success my-2"><i class="fas fa-plus-circle"></i> Add Assets</a>
        <a href="/companies" class="btn btn-secondary my-2"><i class="fas fa-plus-circle"></i> All Suppliers</a>

        <div>
        <a href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this Supplier?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          " class="btn btn-danger my-2"><i class="fas fa-trash"></i> 
                        Delete
          </a>
          <form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>

        </div>
      </p>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container ">
      <div class="row ">
        @foreach ($company->projects as $project)
        <div class="col-md-4 ">
          <div class="card mb-4 shadow-sm">
            <section class="jumbotron text-center bg-dark">
              <div class="container ">
                <h1 class="jumbotron-heading text-white"><i class="fas fa-boxes"></i> {{$project->name}}</h1>
              </section>
              <div class="card-body">
              <p class="card-text">{{$project->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a class="btn btn-sm btn-outline-secondary" href="/projects/{{$project->id}}" role="button">View Asset</a>
                  <a class="btn btn-sm btn-outline-secondary" href="/projects/{{ $project->id }}/edit" role="button">Edit Asset</a>
                </div>
              </div>
              <div>
                <small class="text-muted">Created at:{{$project->created_at}}</small>
              </div>
              <div>
              <small class="text-muted">Updated at:{{$project->updated_at}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</main>

</div>
@endsection

