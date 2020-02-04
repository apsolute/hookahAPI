<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HookahBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'club_name' => $this->hookah->hookahClub->name,
            'hookah_name' => $this->hookah->name,
            'pipes_count' => $this->hookah->pipes_count,
            'offer_id' => $this->id,
            'customer_name' => $this->customer_name,
            'customers_count' => $this->customers_count,
            'offered_date_start' => (string) $this->offered_date_start,
            'offered_date_end' => (string) $this->offered_date_end,
        ];
    }
}
