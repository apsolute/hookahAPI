<?php

namespace App\Repositories;

use App\Models\HookahBooking;
use Carbon\Carbon;

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
        $offeredDateStart = Carbon::parse($fields['date_time'])->toDateTimeString();
        $offeredDateEnd = Carbon::parse($fields['date_time'])
            ->addMinutes(HookahBooking::DEFAULT_TIME_USAGE)
            ->toDateTimeString();

        $fields['offered_date_start'] = $offeredDateStart;
        $fields['offered_date_end'] = $offeredDateEnd;

        return HookahBooking::create($fields);
    }
}