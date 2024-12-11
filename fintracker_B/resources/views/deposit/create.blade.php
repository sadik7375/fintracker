@extends('layouts.layouts')

@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Deposit</h5>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Deposit Details</h4>
                    <form action="{{ route('deposits.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Member</label>
                            <div class="col-sm-10">
                                <select name="member_id" class="form-control" required>
                                    <option value="">Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->member_id }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input type="number" name="amount" class="form-control" placeholder="Enter Amount" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fine</label>
                            <div class="col-sm-10">
                                <input type="number" name="fine" class="form-control" placeholder="Enter Fine (Optional)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Transaction/Account No</label>
                            <div class="col-sm-10">
                                <input type="text" name="transaction_no" class="form-control" placeholder="Enter Transaction No" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Transfer Method</label>
                            <div class="col-sm-10">
                                <input type="text" name="transfer_method" class="form-control" placeholder="Enter Transfer Method" required>
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
