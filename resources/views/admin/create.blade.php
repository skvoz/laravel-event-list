@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Admin area: create user
                        &nbsp;<a href="{{ url('/home') }}"> home </a>
                        &nbsp;<a href="{{ url('/admin') }}"> users </a>
                        &nbsp;<a href="{{ url('/admin/event') }}"> events </a>
                    </div>

                    <div class="panel-body">
                        {!! Form::open([
                        'name' => 'frm',
                        'method' => 'post',
                        "url" => '/admin/user/store',
                        "id"=>"frm",
                        "class"=>"form-horizontal"]) !!}
                        @include("admin._form")
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection