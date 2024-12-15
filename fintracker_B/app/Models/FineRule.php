<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FineRule extends Model
{
    protected $fillable = [
        'fixed_fine',
        'percentage_fine',
    ];
}
