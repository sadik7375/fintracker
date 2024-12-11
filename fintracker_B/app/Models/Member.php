<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'nid',
        'address',
        'nominee_name',
        'nominee_relation',
        'member_id',
        'member_assign_date',
        'photo',
    ];
}
