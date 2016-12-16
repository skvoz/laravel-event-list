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
                        Admin area
                        &nbsp;<a href="{{ url('/home') }}"> home </a>
                        &nbsp;<a href="{{ url('/admin/event') }}"> events </a>
                    </div>
                    <div class="panel-body">
                        <a href="{{url('admin/user/create')}}" class="btn btn-success">create user</a>
                        <br/>
                        <br/>
                        <table class="table">
                            <th>name</th>
                            <th>email</th>
                            <th>action</th>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{url('/admin/user/update', [ 'id' => $user->id])}}">update</a>
                                        <a href="{{url('/admin/user/delete', [ 'id' => $user->id])}}">delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
