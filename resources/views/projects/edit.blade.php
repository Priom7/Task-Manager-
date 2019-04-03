@extends('layouts.app')
@section('content')
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">{{$project->name}}</h1>
      <p class="lead text-muted">{{$project->description}}</p>
      <p>
        <a href="/projects/{{$project->id}}" class="btn btn-primary my-2"><i class="fas fa-eye"></i> View Asset</a>
        <a href="/projects" class="btn btn-secondary my-2"><i class="fas fa-boxes"></i> All Assets</a>
      </p>
    </div>
  </section>
</main>

<div class="row col-md-9 col-lg-9 col-sm-9 pull-left " style="background: white; margin: 10px">
<h1>Update Asset </h1>

      <!-- Example row of columns
      projects.update mathond will be called for update 
      inpust parameter will be used in the update mathon inside projectsControleer ex: name = "name" -->

      <div class="row  col-md-12 col-lg-12 col-sm-12" >

      <form method="post" action="{{ route('projects.update',[$project->id]) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="put">

                            <div class="form-group">
                                <label for="project-name">Name<span class="required">*</span></label>
                                <input   placeholder="Enter name"  
                                          id="project-name"
                                          required
                                          name="name"
                                          spellcheck="false"
                                          class="form-control"
                                          value="{{ $project->name }}"
                                           />
                            </div>


                            <div class="form-group">
                                <label for="project-content">Description</label>
                                <textarea placeholder="Enter description" 
                                          style="resize: vertical" 
                                          id="project-content"
                                          name="description"
                                          rows="5" spellcheck="false"
                                          class="form-control autosize-target text-left">
                                          {{ $project->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit"
                                 class="btn btn-primary"
                                       value="Submit"/>
                            </div>
                        </form>
   

      </div>
</div>


@endsection
