<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Category;

class SuperCategory extends Model
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

    public function customCreate($is_loanable)
    {
        return SuperCategory::create([
            'is_loanable' => $is_loanable,
        ]);
    }
}
