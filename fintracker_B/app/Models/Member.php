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



     // Relationship with Deposit model
     public function deposits()
     {
         return $this->hasMany(Deposit::class, 'member_id');
     }

     // Member model
public function user()
{
    return $this->belongsTo(User::class);
}

}
