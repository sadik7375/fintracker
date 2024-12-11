<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'roi',
        'target',
        'category',
        'investment_date',
        'maturity_date',
    ];
}
