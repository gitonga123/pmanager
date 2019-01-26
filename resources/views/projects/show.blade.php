
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
            <div class="well well-lg">
             <h1>{{ $project->name }}</h1>
             <p class="lead">{{ $project->description }}</p>
                <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-success pull-right">New Task</a>
         </div>

            <div class="row container-fluid col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;">
                @include('partials.comments');

                <form class="form-horizontal" method="post" action="{{ route('comments.store') }}">
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
                        <input type="submit" class="btn btn-success" value="submit"/>
                    </div>
                </form>

            </div>
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
            {{-- <div class="sidebar-module sidebar-module-inset"> --}}
                {{-- <h4>About</h4> --}}
                {{-- <p>Ffiaia <em> Empanticipate YOurself</em> From the vulters. Crass mattis connection pursuit</p> --}}
            {{-- </div> --}}

            <div class="sidebar-module">
                <h4>Actions</h4>
                <ol class="list-unstyled">
                    <li><a href="{{ route('companies.create') }}">New Project</a></li>
                    <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
                    @if(Auth::user()->id == $project->user_id || Auth::user()->roles == 1)
                        <li><a href="#"
                            onclick="
                            var result = confirm('Are you sure you wish to delete this project ?');
                            if (result) {
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }
                            ">Delete</a></li>
                        <form id="delete-form" method="POST" style="display: none;" action="{{ route('projects.destroy', [$project->id]) }}">
                            <input type="hidden" name="_method" value="delete" />
                            {{ csrf_field() }}
                        </form>
                    
                </ol>

                <hr /><h4>Add Members</h4>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">
                        <form id="add-user" method="POST"  action="/project/adduser">
                            <input type="hidden" name="project_id" value="{{ $project->id }}" />
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="submit">Add!</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
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
    @section('jsScript')
        @parent
        <script>
            $(document).ready(function() {
                console.log("Attention");
            });
        </script>
    @endsection
@endsection