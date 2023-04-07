<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function add_item(): HasMany
    {
        return $this->hasMany(AddItem::class);
    }
}
