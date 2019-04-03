<div class="row">
    <div class="col-md-12 col-md-offset-12 col-sm-12">
        
            <!-- Fluid width widget -->        
          <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-comment"></span><i class="fas fa-comments"></i>  
                        Recent Comments
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list">

                      @foreach($comments as $comment)
                        <li class="media">
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <i class="fas fa-user-tie"></i> 
                                    {{$comment->user->email}}
                                    <br>
                                    <small>
                                        commented on <a href="project/{{$project->id}}">{{$project->name}}</a>
                                    </small>
                                </h4>
                                <p>
                                    {{ $comment->body }}
                                </p>
                                <i class="fas fa-file-alt"></i> 
                                <b>
                                Proof:
                            </b>
                                <p >
                                    {{ $comment->url }}
                                </p>
                            </div>
                        </li>
                      @endforeach

                    </ul>
                </div>
            </div>
            <!-- End fluid width widget --> 
            
    </div>
  </div>