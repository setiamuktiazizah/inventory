<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'credential_type',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_role');
    }

    public static function customCreate($role, $credential_type)
    {
        return Role::create([
            'role' => $role,
            'credential_type' => $credential_type,

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
