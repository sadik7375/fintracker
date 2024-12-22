@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Submit Application</h2>
    <form action="{{ route('member-applications.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" required>
        </div>
        <div class="form-group">
            <label for="body">Application Body</label>
            <textarea class="form-control" name="body" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
