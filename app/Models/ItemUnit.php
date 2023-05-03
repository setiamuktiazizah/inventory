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

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function customCreate($name, $default_quantity)
    {
        return ItemUnit::create([
            'name' => $name,
            'default_quantity' => $default_quantity
        ]);
    }
}
