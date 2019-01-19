@extends('layouts.app')

@section('content')
    <div class="col-lg-8 col-md-8 col-md-offset-2 col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">All projects <a class="pull-right btn btn-primary btn-sm" href="{{ route ('projects.create') }}">New Project</a></div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($projects as $project)
                        <li class="list-group-item"> <a href="/companies/{{ $project->id }}">{{ $project->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection