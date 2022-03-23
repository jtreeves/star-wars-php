<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mashup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quote',
        'character',
        'image',
    ];

    /**
    * The relationship to the mashup's profiles.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
