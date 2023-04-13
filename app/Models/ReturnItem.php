<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReturnItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_loan',
        'return_date',
        'note',
    ];

    public function loan_item(): BelongsTo
    {
        return $this->belongsTo(LoanItem::class);
    }

    public function customCreate($return_date, $note, $id_loan)
    {
        return ReturnItem::create([
            'return_date' => $return_date,
            'id_loan' => $id_loan,
            'note' => $note
        ]);
    }
}
