<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\LoanItem;

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

    public static function customCreate($return_date, $note, $id_loan)
    {
        return ReturnItem::create([
            'return_date' => $return_date,
            'note' => $note,
            'id_loan' => $id_loan,

            'created_at' => '2023-05-05 02:57:03',
            'created_by' => 1,
        ]);
    }
}
