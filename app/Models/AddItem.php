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
        'created_by',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }

    public static function customCreate(
        $id_category,
        $date,
        $name,
        $brand,
        $quantity,
        $price,
        $cause,
        // $created_by,
        // $created_at
    ) {
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

// ====== Create ======
// {
//     "id_category": 1,
//     "date": "2023-05-05 02:57:03",
//     "name": "name",
//     "brand": "brand",
//     "quantity": 1,
//     "price": 1,
//     "cause": "cause",

//     "created_at": "2023-05-05 02:57:03",
//     "created_by": 1
// }

// ====== Update ======
// {
//     "id_category": 1,
//     "date": "2023-05-05 02:57:03",
//     "name": "name edited",
//     "brand": "brand edited",
//     "quantity": 1,
//     "price": 1,
//     "cause": "cause edited",

//     "created_at": "2023-05-05 02:57:03",
//     "created_by": 1
// }