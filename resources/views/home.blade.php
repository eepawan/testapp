@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard : User List</div>

                <div class="panel-body">
                    <table width="100%">
                        <tr>
                            <th width="50%">User Name</th>
                            <th width="25%">Total Followers</th>
                            <th width="25%" align="center">Follow</th>
                        </tr>
                        @foreach($userinfo as $key=>$user)
                        <tr id="{{$user['id']}}">
                            <td>{{$user['name']}}</td>
                            <td>{{$user['followerCount']}}</td>
                            <td>
                                @if($user['following']==0)
                                <a href="#" class="follow">Follow</a>
                                @else
                                Following
                                @endif
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
