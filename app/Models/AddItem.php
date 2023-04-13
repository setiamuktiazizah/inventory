<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AddItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category',
        'date',
        'name',
        'brand',
        'quantity',
        'price',
        'cause',
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }

    public function customCreate($id_category, $date, $name, $brand, 
        $quantity, $price, $cause)
    {
        return AddItem::create([
            'id_category' => $id_category,
            'date' => $date,
            'name' => $name,
            'brand' => $brand,
            'quantity' => $quantity,
            'price' => $price,
            'cause' => $cause,
        ]);
    }
}
