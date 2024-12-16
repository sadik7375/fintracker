@extends('layouts.layouts')

@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Investment</h5>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Edit Investment Details</h4>
                    <form action="{{ route('investments.update', $investment->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{ old('name', $investment->name) }}" placeholder="Enter Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input type="number" name="amount" class="form-control" value="{{ old('amount', $investment->amount) }}" placeholder="Enter Amount" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input type="text" name="category" class="form-control" value="{{ old('category', $investment->category) }}" placeholder="Enter Category" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Investment Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="investment_date" class="form-control" value="{{ old('investment_date', $investment->investment_date) }}" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Investment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
