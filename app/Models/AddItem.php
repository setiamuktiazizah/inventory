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
}
