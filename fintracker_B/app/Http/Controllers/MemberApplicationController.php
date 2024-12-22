<?php

namespace App\Http\Controllers;
use App\Models\MemberApplication;
use Illuminate\Http\Request;

class MemberApplicationController extends Controller
{
    public function create() {
        return view('member_applications.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
        MemberApplication::create([
            'member_id' => auth()->id(),
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);
    
        return redirect()->route('member-applications.create')->with('success', 'Application submitted successfully.');
    }
    
    public function index() {
        $applications = MemberApplication::all();
        return view('member_applications.index', ['applications' => $applications]);
    }
}
