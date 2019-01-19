
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
            <div class="well well-lg">
             <h1>{{ $project->name }}</h1>
             <p class="lead">{{ $project->description }}</p>
                {{--<a href="{{route('projects.create')}}" class="btn btn-sm btn-danger pull-right">New Project</a>--}}
         </div>

            <div class="row" style="background: white; margin: 10px;">
            {{--@foreach($project->company as $company)--}}
                {{--<div class="col-lg-4 col-sm-4 col-md-4">--}}
                    {{--<h2>{{ $project->company->name }}</h2>--}}
                    {{--<p> {{ $project->company->description }}</p>--}}
                    {{--<p><a class="btn btn-primary" href="/companies/{{ $project->company->id }}" role="button">View Company</a></p>--}}
                {{--</div>--}}
            {{--@endforeach--}}
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