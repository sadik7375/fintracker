<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FineController extends Controller
{
    public function calculator()
    {
        // Return the view for the fine calculator
        return view('fines.fineCalculator'); // Make sure 'fines' is the correct directory name
    }
}

