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
        $timeEndUsage = Carbon::parse($value)->addMinutes(HookahBooking::DEFAULT_TIME_USAGE);

        $existsOffer = HookahBooking::where(function ($query) use($timeEndUsage, $timeStartUsage){
            $query->whereBetween('offered_date_start', [$timeStartUsage, $timeEndUsage])
                ->orWhereBetween('offered_date_end', [$timeStartUsage, $timeEndUsage]);
        })
            ->where('hookah_id', $this->hookahID)
            ->exists();

        if($existsOffer)
            return false;

        return true;

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
