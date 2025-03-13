@extends('layouts.app')

@section('content')
<h2>Messages</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Date</th>
    </tr>
    @foreach($messages as $msg)
    <tr>
        <td>{{ $msg->name }}</td>
        <td>{{ $msg->email }}</td>
        <td>{{ $msg->message }}</td>
        <td>{{ $msg->created_at }}</td>
    </tr>
    @endforeach
</table>
@endsection
