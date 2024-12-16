@extends('layouts.layouts')

@section('content')
    <div class="container">
        <h1>Member Details</h1>
        <div>
            <p><strong>Name:</strong> {{ $member->name }}</p>
            <p><strong>Phone:</strong> {{ $member->phone }}</p>
            <p><strong>Email:</strong> {{ $member->email }}</p>
            <p><strong>NID:</strong> {{ $member->nid }}</p>
            <p><strong>Address:</strong> {{ $member->address }}</p>
            <p><strong>Nominee Name:</strong> {{ $member->nominee_name }}</p>
            <p><strong>Nominee Relation:</strong> {{ $member->nominee_relation }}</p>
            <p><strong>Member ID:</strong> {{ $member->member_id }}</p>

        </div>

        <h2>Deposits</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Fine</th>
                    <th>Transaction No</th>
                    <th>Transfer Method</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($deposits as $deposit)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $deposit->amount }}</td>
                        <td>{{ $deposit->date }}</td>
                        <td>{{ $deposit->fine }}</td>
                        <td>{{ $deposit->transaction_no }}</td>
                        <td>{{ $deposit->transfer_method }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No deposits found for this member.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('members.index') }}" class="btn btn-primary">Back to Members</a>
    </div>
@endsection
