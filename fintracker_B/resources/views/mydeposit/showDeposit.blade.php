{{-- dashboard.blade.php --}}
@extends('layouts.layouts')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Total Deposits</div>
        <div class="card-body">
            <h5 class="card-title">${{ number_format($totalDeposits, 2) }}</h5>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Amount</th>
                <th scope="col">Fine</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deposits as $deposit)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>${{ number_format($deposit->amount, 2) }}</td>
                    <td>${{ number_format($deposit->fine, 2) }}</td>
                    <td>{{ $deposit->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection