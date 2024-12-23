<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Deposit;
use App\Models\Member;
use Illuminate\Http\Request;
use PDF;
class DepositController extends Controller
{
    // Display a listing of deposits
    public function index()
    {
        $deposits = Deposit::with('member')->get();
        return view('deposit.index', compact('deposits'));
    }

    // Show the form for creating a new deposit
    public function create()
    {
        $members = Member::all();
        return view('deposit.create', compact('members'));
    }

    // Store a newly created deposit
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'fine' => 'nullable|numeric|min:0',
            'transaction_no' => 'required|unique:deposits,transaction_no',
            'transfer_method' => 'required|string|max:255',
        ]);

        Deposit::create($validated);

        return redirect()->route('deposits.index')->with('success', 'Deposit created successfully.');
    }

    // Show the form for editing a deposit
    public function edit(Deposit $deposit)
    {
        $members = Member::all();
        return view('deposit.edit', compact('deposit', 'members'));
    }

    // Update a deposit
    public function update(Request $request, Deposit $deposit)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'fine' => 'nullable|numeric|min:0',
            'transaction_no' => 'required|unique:deposits,transaction_no,' . $deposit->id,
            'transfer_method' => 'required|string|max:255',
        ]);

        $deposit->update($validated);

        return redirect()->route('deposit.index')->with('success', 'Deposit updated successfully.');
    }

    // Remove a deposit
    public function destroy(Deposit $deposit)
    {
        $deposit->delete();

        return redirect()->route('deposits.index')->with('success', 'Deposit deleted successfully.');
    }


    public function showMemberDeposits($memberId)
{
    // Fetch the deposits of the specific member
    $deposits = Deposit::where('member_id', $memberId)->get();
    $member = Member::findOrFail($memberId);

    return view('deposit.show', compact('deposits', 'member'));
}

public function generateSlip($id)
{
    $member = Member::with('deposits')->findOrFail($id);

    // Load the Blade view for the payment slip and pass data
    $pdf = PDF::loadView('deposit.slip', [
        'member' => $member,
        'deposits' => $member->deposits
    ]);

    // Download the generated PDF
    return $pdf->download('payment_slip_' . $member->id . '.pdf');
}

public function showSlip($id)
{
    // Fetch the deposits of the specific member
    $deposits = Deposit::where('member_id', $id)->get();
    $member = Member::findOrFail($id);

    return view('deposit.slip', compact('deposits', 'member'));
  
}

public function sendDepositSlipEmail($memberId, $depositId)
{
    $member = Member::findOrFail($memberId);
    $deposit = Deposit::findOrFail($depositId);

    Mail::send('deposit.email_slip', ['member' => $member, 'deposit' => $deposit], function ($message) use ($member) {
        $message->to($member->email);
        $message->subject('Your Deposit Slip');
    });

    return back()->with('success', 'Deposit slip sent successfully to ' . $member->email);
}


}

