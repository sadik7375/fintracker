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
        
    
        // Pass the data to the view
        return view('dashboard', compact('totalDeposit', 'totalExpense', 'totalInvestment'));
    }


}
