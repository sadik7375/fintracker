<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class MemberController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $members = Member::all();
       return view('members.index', compact('members'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('members.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:members,phone',
            'email' => 'nullable|email|unique:members,email',
            'password' => 'required|min:6',
            'nid' => 'required|unique:members,nid',
            'address' => 'required|string',
            'nominee_name' => 'required|string',
            'nominee_relation' => 'required|string',
            'member_id' => 'required|unique:members,member_id',
            'member_assign_date' => 'required|date',
            'photo' => 'nullable|image|max:2048', // Max 2MB image
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // Create the member with other details
    $member = new Member($request->all());
    $member->user_id = $user->id; // Assuming your Member model has a 'user_id' field
    $member->save();

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    // Display the specified resource
    public function show(Member $id)
    {
         // Get member and their deposits
        $member = Member::findOrFail($id);
        $deposits = Deposit::where('member_id', $id)->get();
        $totalDeposit = Deposit::totalDepositsByMember($id);

        return view('members.show', compact('member', 'deposits', 'totalDeposit'));
        
    }

    // Show the form for editing the specified resource
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:members,phone,' . $member->id,
            'email' => 'nullable|email|unique:members,email,' . $member->id,
            'nid' => 'required|unique:members,nid,' . $member->id,
            'address' => 'required|string',
            'nominee_name' => 'required|string',
            'nominee_relation' => 'required|string',
            'member_id' => 'required|unique:members,member_id,' . $member->id,
            'member_assign_date' => 'required|date',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($member->photo) {
                \Storage::delete('public/' . $member->photo);
            }
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Member $member)
    {
        if ($member->photo) {
            \Storage::delete('public/' . $member->photo);
        }
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }



    
}
