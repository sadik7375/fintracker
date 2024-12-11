@extends('layouts.layouts')

@section('content')

<div class="page-body">
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Member List</h5><br>
            <a href="{{ route('members.create') }}" class="btn btn-primary">
                Add Member
            </a>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="icofont icofont-simple-left "></i></li>
                    <li><i class="icofont icofont-maximize full-card"></i></li>
                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                    <li><i class="icofont icofont-refresh reload-card"></i></li>
                    <li><i class="icofont icofont-error close-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>NID</th>
                            <th>Address</th>
                            <th>Nominee Name</th>
                            <th>Nominee Relation</th>
                            <th>Member ID</th>
                            <th>Assign Date</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->phone }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->nid }}</td>
                                <td>{{ $member->address }}</td>
                                <td>{{ $member->nominee_name }}</td>
                                <td>{{ $member->nominee_relation }}</td>
                                <td>{{ $member->member_id }}</td>
                                <td>{{ $member->member_assign_date }}</td>
                                <td>
                                    @if($member->photo)
                                        <img src="{{ asset('storage/' . $member->photo) }}" alt="Photo" width="50">
                                    @else
                                        No Photo
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">No members found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
