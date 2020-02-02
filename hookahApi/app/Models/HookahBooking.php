<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HookahBooking extends Model
{
    protected $fillable = [
        'hookah_id',
        'customer_name',
        'customers_count',
        'offered_date_start',
        'offered_date_end'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hookah()
    {
        return $this->belongsTo(Hookah::class);
    }
}
