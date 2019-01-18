
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
            <div class="jumbotron">
             <h1>{{ $company->name }}</h1>
             <p class="lead">{{ $company->description }}</p>
             <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get Started Today</a></p>-->
         </div>

            <div class="row" style="background: white; margin: 10px;">
            @foreach($company->projects as $project)
                <div class="col-lg-4 col-sm-4 col-md-4">
                    <h2>{{ $project->name }}</h2>
                    <p class="text-danger">Days: {{ $project->days }}</p>
                    <p> {{ $project->description }}</p>
                    <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project</a></p>
                </div>
            @endforeach
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
                    <li><a href="{{ route('companies.create') }}">New Company</a></li>
                    <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
                    <li><a href="#"
                        onclick="
                        var result = confirm('Are you sure you wish to delete this project ?');
                        if (result) {
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }
                        ">Delete</a></li>
                    <form id="delete-form" method="POST" style="display: none;" action="{{ route('companies.destroy', [$company->id])}}">
                        <input type="hidden" name="_method" value="delete" />
                        {{ csrf_field() }}
                    </form>

                </ol>
            </div>

            <div class="sidebar-module">
                <h4>Links</h4>
                <ol class="list-unstyled">
                    <li><a href="{{ route('projects.create') }}">New Project</a></li>
                    <li><a href="#">New Member</a></li>
                    <li><a href="/companies">View All Campanies</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection