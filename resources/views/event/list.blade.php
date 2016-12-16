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
                        Admin area: events page
                        &nbsp;<a href="{{ url('/home') }}"> home </a>
                        &nbsp;<a href="{{ url('/admin') }}"> users </a>
                        &nbsp;<a href="{{ url('/admin/event') }}"> events </a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url('/admin/event/create')}}" class="btn btn-primary">add event</a>
                        <a href="{{url('/admin/event/list')}}" class="btn btn-primary">list event</a>
                        <br/>
                        <br/>
                        @if($events->count() > 0)
                            <table class="table">
                                <th>name</th>
                                <th>description</th>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{$event->name}}</td>
                                        <td>{{$event->description}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>empty events</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
