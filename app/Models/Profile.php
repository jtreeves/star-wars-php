<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'username',
        'bio',
        'location',
        'avatar',
        'color',
        'movie',
    ];

    // The relationship to the profile's user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // The relationship to the profile's mashups
    public function mashups(): BelongsToMany
    {
        return $this->belongsToMany(Mashup::class, 'favorites', 'profile_id', 'mashup_id');
    }

    // The relationship to the profile's followers
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'fans', 'following_id', 'follower_id');
    }

    // The relationship to the profile's followings
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'fans', 'follower_id', 'following_id');
    }
}
