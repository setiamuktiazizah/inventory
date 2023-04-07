<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'default_quantity',
    ];

    public function category(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
