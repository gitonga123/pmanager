
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
            <div class="jumbotron">
                <h1>New Company</h1>
            </div>

            <div class="row" style="background: white; margin: 10px;">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <form class="form-horizontal" method="post" action="{{route('companies.store')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="company-name">Name<span class="required">*</span></label>
                            <input placeholder="Enter Name"
                                   id="company-name"
                                   required
                                   name="name"
                                   spellcheck="false"
                                   class="form-control"
                            />
                        </div>

                        <div class="form-group">
                            <label for="company-content">Description<span class="required">*</span></label>
                            <textarea placeholder="Enter Name"
                                      id="company-name" style="resize: vertical;"
                                      required
                                      name="description"
                                      spellcheck="false"
                                      class="form-control" rows="5"
                            ></textarea>
                        </div>
                        <div class="form form-group">
                            <input type="submit" class="btn btn-primary" value="submit"/>
                        </div>
                    </form>
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
                    <li><a href="/companies">All Companies</a></li>
                </ol>
            </div>

            {{--<div class="sidebar-module">--}}
            {{--<h4>Members</h4>--}}
            {{--<ol class="list-unstyled">--}}
            {{--<li><a href="#">March 2014</a></li>--}}
            {{--</ol>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection