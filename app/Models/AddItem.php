<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;

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
        'created_by'
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

    public static function customCreate($id_category, $date, $name, $brand, 
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

            'created_at' => '2023-05-05 02:57:03',
            'created_by' => 1,
        ]);
    }
}
