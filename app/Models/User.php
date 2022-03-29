<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // The attributes that are mass assignable
    protected array $fillable = [
        'name',
        'email',
        'password',
    ];

    // The attributes that should be hidden for serialization
    protected array $hidden = [
        'password',
        'remember_token',
    ];

    // The attributes that should be cast
    protected array $casts = [
        'email_verified_at' => 'datetime',
    ];

    // The relationship to the user's profile
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
}
