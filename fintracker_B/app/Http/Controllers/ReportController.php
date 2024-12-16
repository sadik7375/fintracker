<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Deposit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function fineStatistics()
    {
        // Get unpaid members grouped by month
        $fineReport = Member::select(DB::raw('MONTHNAME(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->whereDoesntHave('deposits', function ($query) {
                $query->whereMonth('date', Carbon::now()->month);
            })
            ->groupBy(DB::raw('MONTHNAME(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Convert data to pass to the view
        $months = $fineReport->pluck('month')->toArray();
        $counts = $fineReport->pluck('count')->toArray();

        return view('fines.fine_statistics', compact('months', 'counts'));
    }
}
