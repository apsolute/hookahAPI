<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HookahClub extends Model
{
    protected $table = 'hookah_clubs';

    protected $fillable = [
        'name',
        'description'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hookahs()
    {
        return $this->hasMany(Hookah::class);
    }
}
