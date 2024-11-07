<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

// use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
        'phone',
        'address'
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
        'password' => 'hashed',
    ];

    // protected function password(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn ($value) => bcrypt($value)
    //     );
    // }

    // TEMPORARIO, PARA BYPASSAR A VERIFICAÇÃO DE EMAIL
    protected static function booted()
    {
        static::creating(function ($user) {
            $user->email_verified_at = now();
        });
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
        );
    }
}
