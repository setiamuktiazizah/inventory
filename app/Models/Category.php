<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\ItemUnit;
use App\Models\Item;
use App\Models\SuperCategory;
use App\Models\AddItem;


class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_super_category',
        'id_item_unit',
        'name',
        'quantity',
    ];

    public function item_unit(): BelongsTo
    {
        return $this->belongsTo(ItemUnit::class);
    }

    public function super_category(): BelongsTo
    {
        return $this->belongsTo(SuperCategory::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function add_items(): HasMany
    {
        return $this->hasMany(AddItem::class);
    }

    public static function customCreate($id_super_category, $id_item_unit, 
        $name, $quantity)
    {
        return Category::create([
            'id_super_category' => $id_super_category,
            'id_item_unit' => $id_item_unit,
            'name' => $name,
            'quantity' => $quantity,
            
            'created_at' => '2023-05-05 02:57:03',
            'created_by' => 1,
        ]);
    }
}
