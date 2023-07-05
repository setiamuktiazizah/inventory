<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\LoanItem;
use App\Models\User;

class ReturnItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_loan_item',
        'return_date',
        'note',
        'created_by',
        'created_at',
    ];

    public function loan_item(): BelongsTo
    {
        return $this->belongsTo(LoanItem::class, "id_loan_item");
    }

    public static function customCreate($return_date, $note, $id_loan_item)
    {
        return ReturnItem::create([
            'return_date' => $return_date,
            'note' => $note,
            'id_loan_item' => $id_loan_item,

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
