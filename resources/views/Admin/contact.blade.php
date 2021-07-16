@extends('Admin.layout.admin')

@section('title')
    Contact | Admin - Boson
@endsection

@section('heading')
    Contact Messages
@endsection

@section('content')

    <div class="container mt-4">
        <div class="mb-3">
            <a class="btn btn-info" href="{{route('admin.all.contact')}}">All messages</a>
            <a class="btn btn-danger" href="{{route('admin.contact')}}">Unread messages</a>
        </div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th style="min-width: 150px;">Subject</th>
                    <th style="min-width: 400px;">Message</th>
                    <th>Status</th>
                    <th style="min-width: 300px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($contacts) == 0)
                    <tr>
                        <td colspan="7" class="text-center">No message found</td>
                    </tr>
                @endif
                @foreach($contacts as $con)
                    <tr>
                        <td>{{$con->created_at->format('Y:m:d h:i a')}}</td>
                        <td>{{$con->anonymous_name}}</td>
                        <td>{{$con->anonymous_email}}</td>
                        <td>{{$con->subject}}</td>
                        <td style="min-width: 400px;">{{$con->message}}</td>
                        <td>{{$con->status==0?'Not done yet':'Already done'}}</td>
                        <td>
                            @if($con->status == 0)
                            <a href="{{route('admin.contact.mark', ['id' => $con->id, 'type'=>1])}}" class="btn btn-success">Mark as Done</a>
                            @else
                                <a href="{{route('admin.contact.mark', ['id' => $con->id, 'type'=>0])}}" class="btn btn-danger">Mark as Undone</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-links-here">
            {{$contacts->links()}}
        </div>
    </div>
@endsection
