@extends('Admin.layout.admin')

@section('title')
    All Users
@endsection

@section('heading')
    All Users
@endsection

@section('content')
    <div class="container">
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th style="min-width: 200px;" class="font-weight-bold">Name</th>
                    <th style="min-width: 200px;" class="font-weight-bold">Email</th>
                    <th style="min-width: 200px;" class="font-weight-bold">username</th>
                    <th style="min-width: 200px;" class="font-weight-bold">Institution</th>
                    <th style="min-width: 200px;" class="font-weight-bold">Phone</th>
                    <th style="min-width: 200px;" class="font-weight-bold">Address</th>
                    <th style="min-width: 200px;" class="font-weight-bold">Social Media Link</th>
                    <th style="min-width: 200px;" class="font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->institution}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td><a target="_blank" href="{{$user->social_media_link}}">{{$user->social_media_link}}</a></td>
                        <td><a class="btn btn-black" href="{{route('admin.add.author', ['id'=>$user->id, 'type'=>1])}}">Add as Author</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="next-page-links">
            {{$users->links()}}
        </div>
    </div>
@endsection
