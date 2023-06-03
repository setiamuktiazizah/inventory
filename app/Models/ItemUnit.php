<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Category;
use App\Models\User;

class ItemUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'default_quantity',
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'id_item_unit');
    }

    public static function customCreate($name, $default_quantity)
    {
        return ItemUnit::create([
            'name' => $name,
            'default_quantity' => $default_quantity,
            
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
