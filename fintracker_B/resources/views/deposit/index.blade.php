@extends('layouts.layouts')

@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Deposit List</h5>
                    <a href="{{ route('deposits.create') }}" class="btn btn-primary">Add Deposit</a>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Member</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Fine</th>
                                    <th>Transaction No</th>
                                    <th>Transfer Method</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deposits as $deposit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $deposit->member->name }}</td>
                                        <td>{{ $deposit->amount }}</td>
                                        <td>{{ $deposit->date }}</td>
                                        <td>{{ $deposit->fine ?? 'N/A' }}</td>
                                        <td>{{ $deposit->transaction_no }}</td>
                                        <td>{{ $deposit->transfer_method }}</td>
                                        <td>
                                            <a href="{{ route('deposits.show', $deposit->member->id) }}" class="btn btn-info btn-sm">View Deposits</a>
                                            <a href="{{ route('deposits.edit', $deposit->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('deposits.slip', $deposit->member->id) }}" class="btn btn-info btn-sm">View Slip</a>
                                          
                                        
                                            <form action="{{ route('deposits.destroy', $deposit->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
