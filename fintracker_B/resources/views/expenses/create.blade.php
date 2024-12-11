@extends('layouts.layouts')

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Expense</h5>
                </div>
                <div class="card-block">
                    <form action="{{ route('expenses.store') }}" method="POST">
                        @csrf
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
                  <option value="Transport">Transport</option>
            <option value="Office Cost">Office Cost</option>
            <option value="Food">Food</option>
            <option value="Meeting Cost">Meeting Cost</option>
        </select>
    </div>
</div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" rows="3" placeholder="Enter Description" required></textarea>
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
