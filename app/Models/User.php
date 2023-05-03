<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_role',
        'name',
        'email',
        'password',
        'email_verified_at',
        'no_hp',
        'no_credential',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function add_items(): HasMany
    {
        return $this->hasMany(AddItem::class);
    }

    public function reduce_items(): HasMany
    {
        return $this->hasMany(ReduceItem::class);
    }

    public static function customCreate(
        $id_role,
        $name,
        $password,
        $email,
        $no_hp,
        $no_credential
    ) {
        return User::create([
            'id_role' => $id_role,
            'name' => $name,
            'password' => $password,
            'email' => $email,
            'no_hp' => $no_hp,
            'no_credential' => $no_credential,
        ]);
    }
}
