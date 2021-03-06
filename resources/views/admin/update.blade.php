@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Admin area: update user "{{$user->name}}"
                        &nbsp;<a href="{{ url('/home') }}"> home </a>
                        &nbsp;<a href="{{ url('/admin') }}"> users </a>
                        &nbsp;<a href="{{ url('/admin/event') }}"> events </a>
                    </div>

                    <div class="panel-body">
                        {!! Form::model($user, [
                        'name' => 'frm',
                        'method' => 'post',
                        "url" => url('/admin/user/update', $user->id),
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