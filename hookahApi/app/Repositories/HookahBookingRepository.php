<?php

namespace App\Repositories;

use App\Models\HookahBooking;

class HookahBookingRepository implements HookahBookingInterface
{

    /**
     * @param int $hookahBookingID
     * @return mixed
     */
    public function get(int $hookahBookingID)
    {
        return HookahBooking::find($hookahBookingID);
    }

    /**
     * @param $fields
     * @return mixed
     */
    public function create($fields)
    {
        return HookahBooking::create($fields);
    }
}