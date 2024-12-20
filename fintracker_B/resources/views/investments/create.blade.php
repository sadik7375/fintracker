@extends('layouts.layouts')

@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Investment</h5>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Investment Details</h4>
                    <form action="{{ route('investments.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Investment Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="Enter Investment Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input type="number" name="amount" class="form-control" placeholder="Enter Amount" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select name="category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <option value="Stock">Stock</option>
                                    <option value="Real Estate">Real Estate</option>
                                    <option value="Business">Business</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Investment Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="investment_date" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Maturity Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="maturity_date" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Target ROI</label>
                            <div class="col-sm-10">
                                <input type="number" name="target" step="0.01" class="form-control" placeholder="Enter Target ROI (Optional)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Return on Investment (ROI)</label>
                            <div class="col-sm-10">
                                <input type="number" name="roi" step="0.01" class="form-control" placeholder="Enter ROI (Optional)">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
