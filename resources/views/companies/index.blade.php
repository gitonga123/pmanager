@extends('layouts.app')

@section('content')
    <div class="col-lg-8 col-md-8 col-md-offset-2 col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">Companies <a class="pull-right btn btn-primary btn-sm" href="{{ route ('companies.create') }}">New Company</a></div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($companies as $company)
                        <li class="list-group-item"> <a href="/companies/{{ $company->id }}">{{ $company->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection