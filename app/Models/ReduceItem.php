<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Item;
use App\Models\User;

use App\Models\User;
use App\Models\Item;

class ReduceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_item',
        'date',
        'quantity',
        'cause',
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public static function customCreate($date, $quantity, $cause, $id_item)
    {
        return ReduceItem::create([
            'date' => $date,
            'quantity' => $quantity,
            'cause' => $cause,
            'id_item' => $id_item,
        ]);
    }
}
