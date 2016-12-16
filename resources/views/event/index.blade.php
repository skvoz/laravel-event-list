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
                        <a href="{{url('/admin/event/list')}}" class="btn btn-primary">event list</a>
                        <a href="{{url('/admin/event/assign')}}" class="btn btn-primary">assign event</a>
                        <br/>
                        <br/>
                    @if($users->count() > 0)
                        <table class="table">
                            <th>user</th>
                            <th>event</th>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach($user->events as $event)
                                            <a href="{{url('/admin/event/view', ['id' => $event->id])}}">{{$event->name}}</a>
                                        @endforeach
                                    </td>
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
