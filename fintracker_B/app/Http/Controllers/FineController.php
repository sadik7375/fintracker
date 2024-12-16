<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Deposit;
use Carbon\Carbon;

class FineController extends Controller
{
    public function calculator()
    {
        // Get current month
        $currentMonth = Carbon::now()->month;

        // Fetch members who have NOT paid by the 8th of the current month
        $unpaidMembers = Member::whereDoesntHave('deposits', function ($query) use ($currentMonth) {
            $query->whereMonth('date', $currentMonth)
                  ->whereDay('date', '<=', 8);
        })->get();

        // Return the view with unpaid members
        return view('fines.fineCalculator', compact('unpaidMembers'));
    }
}


