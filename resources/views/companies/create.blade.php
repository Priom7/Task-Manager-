@extends('layouts.app')
@section('content')
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <p>
        <a href="/companies" class="btn btn-secondary my-2">All Suppliers</a>
      </p>
    </div>
  </section>
</main>

<div class="row col-md-9 col-lg-9 col-sm-9 pull-left " style="background: white; margin: 10px">
<h1>Create New Supplier </h1>

      <!-- Example row of columns
      companies.create mathond will be called for create 
      inpust parameter will be used in the create mathod inside CompaniesControleer ex: name = "name" -->

      <div class="row  col-md-12 col-lg-12 col-sm-12" >

      <form method="post" action="{{ route('companies.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="company-name">Name<span class="required">*</span></label>
                                <input   placeholder="Enter name"  
                                          id="company-name"
                                          required
                                          name="name"
                                          spellcheck="false"
                                          class="form-control"
                                           />
                            </div>


                            <div class="form-group">
                                <label for="company-content">Description</label>
                                <textarea placeholder="Enter description" 
                                          style="resize: vertical" 
                                          id="company-content"
                                          name="description"
                                          rows="5" spellcheck="false"
                                          class="form-control autosize-target text-left">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="Submit"/>
                            </div>
                        </form>
   

      </div>
</div>


@endsection
