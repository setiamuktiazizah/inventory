<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\ReturnItem;
use App\Models\LoanRequest;
use App\Models\User;

class LoanItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_loan_request',
        'status'
    ];

    public function loan_request(): BelongsTo
    {
        return $this->belongsTo(LoanRequest::class, 'id_loan_request');
    }

    public function return_item(): HasOne
    {
        return $this->hasOne(ReturnItem::class, 'id_loan_item');
    }

    public static function customCreate(
        $id_loan_request,
        $status
    ) {
        return LoanItem::create([
            'id_loan_request' => $id_loan_request,
            'status' => $status,

            'created_at' => '2023-05-05 02:57:03',
            'created_by' => 1,
        ]);
    }

    
    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updated_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
