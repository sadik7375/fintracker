@extends('layouts.layouts')

@section('content')
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Add Member</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-spinner-alt-5"></i>
                        </div>
                    </div>
                    <div class="card-block">
                        <h4 class="sub-title">Add Member Details</h4>
                        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Member Name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                                </div>
                            </div>
                            <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                               </div>
                             </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NID</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nid" class="form-control" placeholder="Enter National ID" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control" rows="3" placeholder="Enter Address" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nominee Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nominee_name" class="form-control" placeholder="Enter Nominee Name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nominee Relation</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nominee_relation" class="form-control" placeholder="Enter Relation with Nominee" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Member ID</label>
                                <div class="col-sm-10">
                                    <input type="text" name="member_id" class="form-control" placeholder="Enter Unique Member ID" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Assign Date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="member_assign_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- Basic Form Inputs card end -->
            </div>
        </div>
    </div>
@endsection
