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
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

use App\Models\Role;

class User extends Authenticatable implements JWTSubject
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

    // ==> unnecesary
    // public function add_items(): HasMany
    // {
    //     return $this->hasMany(AddItem::class, 'created_by');
    // }

    // public function reduce_items(): HasMany
    // {
    //     return $this->hasMany(ReduceItem::class, 'created_by');
    // }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public static function customCreate($id_role, $name, $password, $email, $no_hp, $no_credential)
    {
        return User::create([
            'id_role' => $id_role,
            'name' => $name,
            'password' => $password,
            'email' => $email,
            'no_hp' => $no_hp,
            'no_credential' => $no_credential,

            'created_at' => '2023-05-05 02:57:03',
            'created_by' => 1,
        ]);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    // public function created_by(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'created_by');
    // }

    public function updated_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function create_add_items(): HasMany
    {
        return $this->hasMany(AddItem::class, 'created_by');
    }

    public function edit_add_items(): HasMany
    {
        return $this->hasMany(AddItem::class, 'edited_by');
    }
}
