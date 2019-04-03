@extends('layouts.app')
@section('content')
<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
	<div class="card">
  		<div class="card-body">
    		<h5 class="card-title"><i class="fas fa-people-carry"></i> Suppliers</h5>
        <a href="/companies/create" class="btn btn-primary btn-sm my-2"><i class="fas fa-plus-circle"></i> Add Supplier</a>
  		</div>
  		<ul class="list-group list-group-flush">
    		@foreach($companies as $company)
         		<li class="list-group-item"><a href="/companies/{{$company->id}}"><i class="fas fa-people-carry"></i>  {{$company->name}}</a></li>
     		 @endforeach 
  		</ul>
	</div>
</div>




@endsection


