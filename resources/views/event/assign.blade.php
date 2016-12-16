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
                        Admin area: assign event page
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

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/admin/event/assign-store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <label for="user_id" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <select id="user_id" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->email}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('custom_event_id') ? ' has-error' : '' }}">
                                <label for="custom_event_id" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <select id="custom_event_id" name="custom_event_id">
                                        @foreach ($events as $event)
                                            <option value="{{$event->id}}">{{$event->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('custom_event_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('custom_event_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
