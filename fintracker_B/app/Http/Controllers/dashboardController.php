<?php

namespace App\Http\Controllers;
use App\Models\Deposit;
use App\Models\Expense;
use App\Models\Investment;
use Illuminate\Http\Request;

class dashboardController extends Controller
{

    
    public function dashboard()
    {
        // Calculate totals
        $totalDeposit = Deposit::sum('amount'); // Sum of all deposits
        $totalExpense = Expense::sum('amount'); // Sum of all expenses
        $totalInvestment = Investment::sum('amount'); // Sum of all investments
        
        $investments = Investment::all();
        $investmentChartData = [
            'labels' => $investments->pluck('name')->toArray(),
            'values' => $investments->map(function ($investment) {
                return $investment->roi - $investment->target;
            })->toArray(),
            'colors' => $investments->map(function ($investment) {
                return $investment->roi > $investment->target ? 'rgba(75, 192, 192, 0.5)' : 'rgba(255, 99, 132, 0.5)';
            })->toArray(),
        ];
        // Pass the data to the view
        return view('dashboard', compact('totalDeposit','investmentChartData', 'investments','totalExpense', 'totalInvestment'));
    }
   

}
