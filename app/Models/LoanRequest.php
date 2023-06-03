<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\Item;
use App\Models\LoanItem;
use App\Models\User;

class LoanRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_item',
        'loan_date',
        'max_return_date',
        'pathfile',
        'status',
        'note',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'id_item');
    }

    public function loan_item(): HasOne
    {
        return $this->hasOne(LoanItem::class, 'id_loan_request');
    }

    public static function customCreate(
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
