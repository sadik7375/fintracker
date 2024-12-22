<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberApplication extends Model
{
    protected $table = 'member_applications';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'member_id', 'email', 'subject', 'body'
    ];

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'member_id');
    }
}
