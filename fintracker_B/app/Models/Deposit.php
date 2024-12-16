<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'member_id',
        'amount',
        'date',
        'fine',
        'transaction_no',
        'transfer_method',
    ];

    // Relationship with Member model
      // Relationship with Member model
      public function member()
      {
          return $this->belongsTo(Member::class, 'member_id');
      }

    public static function totalDepositsByMember($memberId)
    {
        return self::where('member_id', $memberId)->sum('amount');
    }

}
