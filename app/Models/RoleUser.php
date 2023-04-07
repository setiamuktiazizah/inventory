<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_user', 'id');
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }
}
