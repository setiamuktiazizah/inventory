<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Item;
use App\Models\User;

class ReduceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_item',
        'date',
        'quantity',
        'cause',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'id_item');
    }

    public static function customCreate($date, $quantity, $cause, $id_item)
    {
        return ReduceItem::create([
            'date' => $date,
            'quantity' => $quantity,
            'cause' => $cause,
            'id_item' => $id_item,

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
