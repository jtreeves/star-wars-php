<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'username',
        'bio',
        'location',
        'avatar',
        'movie',
    ];

    /**
    * The relationship to the profile's user.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * The relationship to the profile's mashups.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function mashups()
    {
        return $this->belongsToMany(Mashup::class, 'favorites', 'profile_id', 'mashup_id');
    }
}
