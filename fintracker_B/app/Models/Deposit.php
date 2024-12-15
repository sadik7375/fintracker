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
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public static function totalDepositsByMember($memberId)
    {
        return self::where('member_id', $memberId)->sum('amount');
    }

    public function calculateFine($dueDate)
    {
        $fineRule = FineRule::first(); // Fetch the current fine rule
        $today = now();
        $fine = 0;

        if ($today > $dueDate) {
            $overdueDays = $today->diffInDays($dueDate);

            // Calculate fines
            $fixedFine = $fineRule->fixed_fine;
            $percentageFine = ($this->amount * $fineRule->percentage_fine / 100) * $overdueDays;

            $fine = $fixedFine + $percentageFine;
        }

        return $fine;
    }
}
