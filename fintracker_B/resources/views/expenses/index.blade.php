@extends('layouts.layouts')

@section('content')
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>Expense List</h5><br>
            <a href="{{ route('expenses.create') }}" class="btn btn-primary">
                Add Expense
            </a>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                <thead>
    <tr>
        <th>#</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Category</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach($expenses as $expense)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $expense->amount }}</td>
            <td>{{ $expense->date }}</td>
            <td>{{ $expense->category }}</td>
            <td>{{ $expense->description ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
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
@endsection
