@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">User Messages</h2>
    
    @if($messages->isEmpty())
        <p class="text-muted">No messages yet.</p>
    @else
    <table class="table table-hover table-striped align-middle shadow-sm rounded overflow-hidden" style="background-color: #ffffff;">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->message }}</td>
                    <td>{{ $message->created_at->format('d-m-Y H:i')}}</td>
                    <td>
                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @endif
</div>
@endsection
