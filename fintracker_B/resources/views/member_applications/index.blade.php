@extends('layouts.layouts')
@section('content')
<div class="container">
    <h2>View Applications</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Email</th>
                <th>Subject</th>
                <th>Body</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
            <tr>
                <td>{{ $application->email }}</td>
                <td>{{ $application->subject }}</td>
                <td>{{ $application->body }}</td>
                <td>{{ $application->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
