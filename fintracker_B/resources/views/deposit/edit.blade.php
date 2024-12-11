@extends('layouts.layouts')

@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Deposit</h5>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Edit Deposit Details</h4>
                    <form action="{{ route('deposits.update', $deposit->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Member</label>
                            <div class="col-sm-10">
                                <select name="member_id" class="form-control" required>
                                    <option value="">Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}" 
                                            {{ $member->id == old('member_id', $deposit->member_id) ? 'selected' : '' }}>
                                            {{ $member->name }} ({{ $member->member_id }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input type="number" name="amount" class="form-control" value="{{ old('amount', $deposit->amount) }}" placeholder="Enter Amount" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" value="{{ old('date', $deposit->date) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fine</label>
                            <div class="col-sm-10">
                                <input type="number" name="fine" class="form-control" value="{{ old('fine', $deposit->fine) }}" placeholder="Enter Fine (Optional)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Transaction/Account No</label>
                            <div class="col-sm-10">
                                <input type="text" name="transaction_no" class="form-control" value="{{ old('transaction_no', $deposit->transaction_no) }}" placeholder="Enter Transaction No" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Transfer Method</label>
                            <div class="col-sm-10">
                                <input type="text" name="transfer_method" class="form-control" value="{{ old('transfer_method', $deposit->transfer_method) }}" placeholder="Enter Transfer Method" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Deposit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
