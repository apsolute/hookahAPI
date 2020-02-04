<?php

namespace App\Repositories;

use App\Models\Hookah;
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

    /**
     * @param $options
     * @return mixed
     */
    public function findAvailableHookahs($options)
    {
       $dateFrom = Carbon::parse($options['date_from']);
       $dateTo = Carbon::parse($options['date_to']);
       $customersCount = $options['customers_count'] / 2;

       $availableHookahs = Hookah::where('pipes_count', '>=', $customersCount)
        ->whereDoesntHave('hookahBooks', function ($query) use($dateFrom, $dateTo){
            $query->whereBetween('offered_date_start', [$dateFrom, $dateTo])
                ->orWhereBetween('offered_date_end', [$dateFrom, $dateTo]);
        })->get();

        return $availableHookahs;
    }

    /**
     * @return mixed
     */
    public function getCustomers()
    {
        return HookahBooking::whereDate('offered_date_start', '>', Carbon::now())->get();
    }
}