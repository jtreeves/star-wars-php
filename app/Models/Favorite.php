<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Favorite extends Pivot
{
    /**
     * The name of the model's table.
     *
     * @var string
     */
    protected $table = 'favorites';

    /**
     * The ability of the favorite to increment.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'profile_id',
        'mashup_id',
    ];

    /**
    * The relationship to the favorite's profile.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
    * The relationship to the favorite's mashup.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function mashup()
    {
        return $this->belongsTo(Mashup::class);
    }
}
