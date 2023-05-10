<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\ReduceItem;
use App\Models\LoanRequest;
use App\Models\LoanItem;
use App\Models\AddItem;
use App\Models\Category;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_add_item',
        'id_category',
        'barcode',
        'name',
        'brand',
        'quantity',
        'condition'
    ];

    public function reduce_items(): HasMany
    {
        return $this->hasMany(ReduceItem::class);
    }

    public function loan_requests(): HasMany
    {
        return $this->hasMany(LoanRequest::class);
    }

    public function loan_items(): HasMany
    {
        return $this->hasMany(LoanItem::class);
    }

    public function add_item(): BelongsTo
    {
        return $this->belongsTo(AddItem::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
