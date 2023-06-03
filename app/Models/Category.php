<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\ItemUnit;
use App\Models\SuperCategory;
use App\Models\AddItem;
use App\Models\User;


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
        return $this->belongsTo(ItemUnit::class, 'id_item_unit');
    }

    public function super_category(): BelongsTo
    {
        return $this->belongsTo(SuperCategory::class, 'id_super_category');
    }

    public function add_items(): HasMany
    {
        return $this->hasMany(AddItem::class, 'id_category');
    }

    public static function customCreate($id_super_category, $id_item_unit, $name, $quantity)
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

    
    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updated_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
