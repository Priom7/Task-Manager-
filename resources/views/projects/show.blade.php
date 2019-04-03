@extends('layouts.app')
@section('content')
<main role="main">
  <section class="jumbotron text-center bg-dark col-md-12 col-lg-12 col-sm-12">
    <div class="container">
      <h1 class="jumbotron-heading text-white">{{$project->name}}</h1>
      <p class="lead text-muted text-white">{{$project->description}}</p>
      <p>
        <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary my-2"><i class="fas fa-edit"></i> Edit</a>
        <a href="/projects/create" class="btn btn-danger my-2"><i class="fas fa-bug"></i> Report</a>
        <a href="/projects/create" class="btn btn-success my-2"><i class="fas fa-user-plus"></i> Assign Asset</a>
        <a href="/projects/create" class="btn btn-info my-2"><i class="fas fa-tasks"></i> Assign Task</a>
        <a href="/projects" class="btn btn-secondary my-2"><i class="fas fa-boxes"></i> All Assets</a>
      </p>

    @if($project->user_id == Auth::user()->id)
      <div>
        <a href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this Project?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          " class="btn btn-danger my-2"><i class="fas fa-trash"></i> 
                        Delete
          </a>
          <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>

        </div>
        @endif
    </div>
  </section>
  <h4>Add User </h4>
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <form id="add-user" action="{{ route('projects.adduser') }}" 
                method="POST">
    <div class="input-group">
      {{ csrf_field() }}
      <input value="{{ $project->id }}" class="form-control" name="project_id"  type="hidden">
      <input type="text" class="form-control" name="email" placeholder="email@...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Add User!</button>
      </span>
    </div><!-- /input-group -->
  </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<br>

<h4>Asset User </h4>
<ol class="list-unstyled">
  @foreach($project->users as $user)
  <li><a href="#"> {{ $user->email }}</a></li>
  @endforeach
</ol>

<br>

  @include('partials.comments')


<div class="row container-fluid">
  <form method="post" action="{{ route('comments.store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="commentable_type" value="App\Project">
                            <input type="hidden" name="commentable_id" value="{{ $project->id }}">
                            <div class="form-group">
                                <label for="comment-content"><i class="fas fa-comment-medical"></i> Comment</label>
                                <textarea placeholder="Enter Comment" 
                                          style="resize: vertical" 
                                          id="comment-content"
                                          name="body"
                                          rows="3" spellcheck="true"
                                          class="form-control autosize-target text-left">
                                </textarea>
                            </div>
                    


                              <div class="form-group">
                                <label for="comment-content"><i class="fas fa-file-medical"></i> Url (Proof Of Work Done)</label>
                                <textarea placeholder="Enter url or screenshots" 
                                          style="resize: vertical" 
                                          id="comment-content"
                                          name="url"
                                          rows="2" spellcheck="false"
                                          class="form-control autosize-target text-left">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="Submit"/>
                            </div>
  </form>
  </div>



  


</main>



@endsection

