<?php
namespace App\Http\Requests\BookingRules;


use App\Models\Hookah;
use Illuminate\Contracts\Validation\Rule;

class HookahCustomersCheck implements Rule
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
        $hookah = Hookah::find($this->hookahID);

        if(($hookah->pipes_count * 2) < $value)
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
        return ':attribute to many for this hookah';
    }
}
