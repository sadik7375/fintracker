<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{

    public function getMonthlyROI()
{
    return Investment::selectRaw('YEAR(investment_date) as year, MONTH(investment_date) as month, AVG(roi) as average_roi, AVG(target) as average_target')
                     ->groupBy('year', 'month')
                     ->orderByRaw('YEAR(investment_date) ASC, MONTH(investment_date) ASC')
                     ->get();
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $investments = Investment::all();
        $monthlyROI = $this->getMonthlyROI(); // This should call the method we defined above
        return view('investments.index', compact('investments', 'monthlyROI'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('investments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string',
            'investment_date' => 'required|date',
        ]);

        Investment::create($request->all());

        return redirect()->route('investments.index')->with('success', 'Investment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $investment = Investment::findOrFail($id);
        return view('investments.show', compact('investment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $investment = Investment::findOrFail($id);
        return view('investments.edit', compact('investment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investment $investment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string',
            'investment_date' => 'required|date',
        ]);

        $investment->update($request->all());

        return redirect()->route('investments.index')->with('success', 'Investment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        $investment->delete();

        return redirect()->route('investments.index')->with('success', 'Investment deleted successfully!');
    }


    public function updateInvestmentReturns(Request $request, $investmentId)
    {
        $newReturnAmount = $request->input('return_amount'); // Assuming you pass this from a form or an API call

        $investment = Investment::findOrFail($investmentId); // Using findOrFail to handle the case where the investment doesn't exist
        $investment->returns = $newReturnAmount;  // Update the cumulative profit
        $profit=($investment->returns -$investment->amount);
        $investment->roi = ($profit*100)/$investment->amount ; // Recalculate ROI
        $investment->save();

        return redirect()->route('investments.index')->with('success', 'Investment returns updated and ROI calculated.');
    }



    public function showInvestmentStatus()
    {
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
    
        return view('profitLoss.profitloss',compact('investments', 'investmentChartData'));
    }


  
    


}
