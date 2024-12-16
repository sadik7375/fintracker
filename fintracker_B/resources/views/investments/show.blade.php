@extends('layouts.layouts')

@section('content')
    <div class="container">
        <h1>Investment Details</h1>
        <div>
            <p><strong>Name:</strong> {{ $investment->name }}</p>
            <p><strong>Amount:</strong> {{ $investment->amount }}</p>
            <p><strong>Category:</strong> {{ $investment->category }}</p>
            <p><strong>Investment Date:</strong> {{ $investment->investment_date }}</p>
        </div>
        <a href="{{ route('investments.index') }}" class="btn btn-primary">Back</a>
        <a href="{{ route('investments.edit', $investment->id) }}" class="btn btn-warning">Edit</a>
    </div>
@endsection
