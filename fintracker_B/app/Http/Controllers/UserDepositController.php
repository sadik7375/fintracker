<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDepositController extends Controller
{
    public function showUserDeposit()
{
    $user = Auth::user(); // Get the authenticated user
    $member = $user->member; // Get the member details from the User

    if ($member) {
        $deposits = $member->deposits; // Get all deposits related to the member
        $totalDeposits = $deposits->sum('amount'); // Calculate the total amount of deposits
    } else {
        $deposits = collect(); // Return an empty collection if no member data
        $totalDeposits = 0;
    }

    return view('mydeposit.showDeposit', compact('deposits', 'totalDeposits'));
}
}
