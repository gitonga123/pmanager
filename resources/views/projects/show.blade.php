
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
            <div class="well well-lg">
             <h1>{{ $project->name }}</h1>
             <p class="lead">{{ $project->description }}</p>
                <a href="{{route('tasks.create')}}" class="btn btn-sm btn-danger pull-right">New Task</a>
         </div>

            <div class="row container-fluid col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;">

                <form class="form-horizontal" method="post" action="{{route('comments.store')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="commentable_type" value="pmanager\Project">
                    <input type="hidden" name="commentable_id" value="{{ $project->id }}">

                    <div class="form-group">
                        <label for="comment-content">Comment<span class="required">*</span></label>
                        <textarea placeholder="Enter Name"
                                  id="comment-content" style="resize: vertical;"
                                  required
                                  name="body"
                                  spellcheck="false"
                                  class="form-control" rows="3"
                        ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="comment-url">Proof of work Done (url/photos)<span class="required">*</span></label>
                        <textarea placeholder="Enter Name"
                                  id="comment-url" style="resize: vertical;"
                                  required
                                  name="url"
                                  spellcheck="false"
                                  class="form-control" rows="2"
                        ></textarea>
                    </div>
                    <div class="form form-group">
                        <input type="submit" class="btn btn-primary" value="submit"/>
                    </div>
                </form>

            
                <!-- <div class="col-lg-4 col-sm-4 col-md-4"> -->
                    <!-- <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project</a></p> -->
                <!-- </div> -->
            

                <div class="row">
                    <!-- <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12"> -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <span class="glyphicon glyphicon-comment"></span>
                                    Recent Comments
                                </h3>
                            </div>
                            <div class="panel-body">
                                <ul class="media-list">
                                    @foreach($project->comments as $comment)
                                        <li class="media">
                                            <div class="media-left">
                                                <img src="http:://placehold.it/60x60" class="img-circle">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="user/{{ $comment->user->id }}">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</a>
                                                    <br />

                                                    <small>
                                                        Commented on {{ $comment->created_at }}
                                                    </small>
                                                </h4>
                                                <p>
                                                    {{ $comment->body }}
                                                </p>
                                                Proof:
                                                <p>
                                                    {{ $comment->url }}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="#" class="btn btn-default btn-block">More Comments</a>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
            {{--<div class="sidebar-module sidebar-module-inset">--}}
                {{--<h4>About</h4>--}}
                {{--<p>Ffiaia <em> Empanticipate YOurself</em> From the vulters. Crass mattis connection pursuit</p>--}}
            {{--</div>--}}

            <div class="sidebar-module">
                <h4>Actions</h4>
                <ol class="list-unstyled">
                    <li><a href="{{ route('companies.create') }}">New Project</a></li>
                    <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
                    @if(Auth::user()->id == $project->user_id)
                        <li><a href="#"
                            onclick="
                            var result = confirm('Are you sure you wish to delete this project ?');
                            if (result) {
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }
                            ">Delete</a></li>
                        <form id="delete-form" method="POST" style="display: none;" action="{{ route('projects.destroy', [$project->id])}}">
                            <input type="hidden" name="_method" value="delete" />
                            {{ csrf_field() }}
                        </form>
                    @endif
                </ol>
            </div>

            <div class="sidebar-module">
                <h4>Links</h4>
                <ol class="list-unstyled">
                    <li><a href="{{ route('projects.create') }}">New Company</a></li>
                    <li><a href="#">New Member</a></li>
                    <li><a href="/projects">View My Company</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection