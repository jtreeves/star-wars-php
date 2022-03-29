<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Mashup extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected array $fillable = [
        'quote',
        'character',
        'image',
    ];

    // Establish the relationship to the mashup's profiles
    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }
}
