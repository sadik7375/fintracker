@extends('layouts.layouts')

@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Edit Member</h5>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Edit Member Details</h4>
                    <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}" placeholder="Enter Member Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $member->phone) }}" placeholder="Enter Phone Number" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}" placeholder="Enter Email Address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NID</label>
                            <div class="col-sm-10">
                                <input type="text" name="nid" class="form-control" value="{{ old('nid', $member->nid) }}" placeholder="Enter National ID" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea name="address" class="form-control" rows="3" placeholder="Enter Address" required>{{ old('address', $member->address) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nominee Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="nominee_name" class="form-control" value="{{ old('nominee_name', $member->nominee_name) }}" placeholder="Enter Nominee Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nominee Relation</label>
                            <div class="col-sm-10">
                                <input type="text" name="nominee_relation" class="form-control" value="{{ old('nominee_relation', $member->nominee_relation) }}" placeholder="Enter Relation with Nominee" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Member ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="member_id" class="form-control" value="{{ old('member_id', $member->member_id) }}" placeholder="Enter Unique Member ID" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Assign Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="member_assign_date" class="form-control" value="{{ old('member_assign_date', $member->member_assign_date) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                @if($member->photo)
                                    <p>Current Photo:</p>
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="Photo" width="100" class="mb-3">
                                @endif
                                <input type="file" name="photo" class="form-control">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Member</button>
                    </form>
                </div>
            </div>
            <!-- Basic Form Inputs card end -->
        </div>
    </div>
</div>

@endsection
