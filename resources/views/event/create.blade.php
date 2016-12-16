@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(\Illuminate\Support\Facades\Session::has('messages'))
                    <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('messages')}}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Admin area: create event page
                        &nbsp;<a href="{{ url('/home') }}"> home </a>
                        &nbsp;<a href="{{ url('/admin') }}"> user </a>
                        &nbsp;<a href="{{ url('/admin/event') }}"> events </a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url('/admin/event/create')}}" class="btn btn-primary">add event</a>
                        <a href="{{url('/admin/event/list')}}" class="btn btn-primary">event list</a>
                        <a href="{{url('/admin/event/assign')}}" class="btn btn-primary">assign event</a>
                        <br/>
                        <br/>

                        {!! Form::open([
                        'name' => 'frm',
                        'method' => 'post',
                        "url" => '/admin/event/store',
                        "id"=>"frm",
                        "class"=>"form-horizontal"]) !!}
                        @include("event._form")
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection