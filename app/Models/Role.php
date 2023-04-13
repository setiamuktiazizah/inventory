<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'credential_type',
    ];

    public static function customCreate($role, $credential_type)
    {
        return Role::create([
            'role' => $role,
            'credential_type' => $credential_type
        ]);   
    }

    
}
