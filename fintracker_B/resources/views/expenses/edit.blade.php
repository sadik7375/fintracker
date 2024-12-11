@extends('layouts.layouts')

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Expense</h5>
                </div>
                <div class="card-block">
                    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input type="number" name="amount" class="form-control" value="{{ $expense->amount }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
    <label class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
        <select name="category" class="form-control" required>
            <option value="Transport" {{ $expense->category == 'Transport' ? 'selected' : '' }}>Transport</option>
            <option value="Office Cost" {{ $expense->category == 'Office Cost' ? 'selected' : '' }}>Office Cost</option>
            <option value="Food" {{ $expense->category == 'Food' ? 'selected' : '' }}>Food</option>
            <option value="Meeting Cost" {{ $expense->category == 'Meeting Cost' ? 'selected' : '' }}>Meeting Cost</option>
        </select>
    </div>
</div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" value="{{ $expense->date }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" rows="3" required>{{ $expense->description }}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Expense</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
