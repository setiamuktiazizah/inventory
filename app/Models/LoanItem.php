<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LoanItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_loan_request',
        'id_item',
        'quantity',
        'max_return_date',
        'id_user',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function loan_request(): BelongsTo
    {
        return $this->belongsTo(LoanRequest::class);
    }

    public function return_item(): HasOne
    {
        return $this->hasOne(ReturnItem::class);
    }

    public function customCreate($id_loan_request, $id_item, $quantity,
        $max_return_date)
    {
        return LoanItem::create([
            'id_loan_request' => $id_loan_request,
            'id_item' => $id_item,
            'quantity' => $quantity,
            'max_return_date' => $max_return_date,
        ]);
    }
}
