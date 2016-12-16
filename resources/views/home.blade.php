@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        Dashboard
                        @can('administrator')
                            &nbsp;<a href="{{ url('/home') }}"> home </a>
                            &nbsp;<a href="{{ url('/admin') }}"> users </a>
                            &nbsp;<a href="{{ url('/admin/event') }}"> events </a>
                        @endcan
                    </div>

                    <div class="panel-body">
                        <h1>You can take part at events:</h1>
                        @if($events->count() > 0)
                            @foreach($events as $event)
                                <h3>{{$event->name}}</h3>
                                <p>{{$event->description}}</p>
                            @endforeach
                        @else
                            <p>none events</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
