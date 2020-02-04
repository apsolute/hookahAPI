<?php
namespace App\Http\Requests\BookingRules;

use App\Models\HookahBooking;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class HookahBookingTimeCheck implements Rule
{

    private $hookahID;

    public function __construct(int $hookahID)
    {
        $this->hookahID = $hookahID;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $timeStartUsage = Carbon::parse($value);
        $timeEndUsage = $timeStartUsage->addMinutes(HookahBooking::DEFAULT_TIME_USAGE);

        $existsOffer =HookahBooking::whereBetween('offered_date_start', [$timeStartUsage, $timeEndUsage])
            ->whereBetween('offered_date_end', [$timeStartUsage, $timeEndUsage])
            ->where('hookah_id', $this->hookahID)
            ->exists();

        if($existsOffer)
            return true;

        return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return 'This hookah is busy for offered time';
    }
}
