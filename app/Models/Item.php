<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\ReduceItem;
use App\Models\LoanRequest;
use App\Models\AddItem;
use App\Models\User;

use Illuminate\Support\Facades\DB;


class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_add_item',
        'quantity',
        'condition',
        'is_empty',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function reduce_items(): HasMany
    {
        return $this->hasMany(ReduceItem::class, 'id_item');
    }

    public function loan_requests(): HasMany
    {
        return $this->hasMany(LoanRequest::class, 'id_item');
    }

    public function add_item(): BelongsTo
    {
        return $this->belongsTo(AddItem::class, 'id_add_item');
    }

    public static function customCreate(
        $id_add_item,
        $quantity,
        $condition,
        $is_empty
    ) {
        return Item::create([
            'id_add_item' => $id_add_item,
            'quantity' => $quantity,
            'condition' => $condition,
            'is_empty' => $is_empty,
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

    public static function getAvailableItems($id_category)
    {
        return DB::table('items')
            ->join('add_items', 'items.id_add_item', '=', 'add_items.id')
            ->select('items.*', 'add_items.name', 'add_items.brand')
            ->where('items.is_empty', false)
            ->where('add_items.id_category', $id_category)
            ->get();
    }
}
