<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hookah extends Model
{
    protected $fillable = [
        'hookah_club_id',
        'name',
        'pipes_count'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hookahClub()
    {
        return $this->belongsTo(HookahClub::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hookahBooks()
    {
        return $this->hasMany(HookahBooking::class);
    }
}
