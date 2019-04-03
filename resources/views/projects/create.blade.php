@extends('layouts.app')
@section('content')
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <p>
        <a href="/projects" class="btn btn-secondary my-2">All Assets</a>
      </p>
    </div>
  </section>
</main>

<div class="row col-md-9 col-lg-9 col-sm-9 pull-left " style="background: white; margin: 10px">
  <h1>Create New Asset </h1>

      <!-- Example row of columns
      projects.create mathond will be called for create 
      inpust parameter will be used in the create mathod inside projectsControleer ex: name = "name" -->

            <!-- Example row of columns -->
       <div class="row  col-md-12 col-lg-12 col-sm-12" >

        <form method="post" action="{{ route('projects.store') }}">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="project-name">Name<span class="required">*</span></label>
                                  <input   placeholder="Enter name"  
                                          id="project-name"
                                          required
                                          name="name"
                                          spellcheck="false"
                                          class="form-control"
                                           />
                            </div>

                                  @if($companies == null)
                              <input   
                                  class="form-control"
                                  type="hidden"
                                          name="company_id"
                                          value="{{ $company_id }}"
                                           />
                                  </div>

                                  @endif

                            @if($companies != null)
                            <div class="form-group">
                                <label for="company-content">Select Supplier</label>

                                <select name="company_id" class="form-control" > 

                                @foreach($companies as $company)
                                        <option value="{{$company->id}}"> {{$company->name}} </option>
                                      @endforeach
                                </select>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="project-content">Description</label>
                                <textarea placeholder="Enter description" 
                                          style="resize: vertical" 
                                          id="project-content"
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
</div>
</div>


@endsection
