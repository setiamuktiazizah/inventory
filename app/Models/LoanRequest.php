<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\Item;
use App\Models\LoanItem;

class LoanRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_item',
        'loan_date',
        'max_return_date',
        'id_user',
        'pathfile',
        'status',
        'note',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function loan_item(): HasOne
    {
        return $this->hasOne(LoanItem::class);
    }

    public function customCreate(
        $id_item,
        $loan_date,
        $max_return_date,
        $path_file_cdn,
        $status,
        $note
    ) {
        return LoanRequest::create([
            'id_item' => $id_item,
            'loan_date' => $loan_date,
            'max_return_date' => $max_return_date,
            'path_file_cdn' => $path_file_cdn,
            'status' => $status,
            'note' => $note,
        ]);
    }
}
