<?php
namespace App\Http\Requests\BookingRules;


use App\Models\Hookah;
use Illuminate\Contracts\Validation\Rule;

class HookahCustomersCheck implements Rule
{

    private $hookahID;

    public function __construct($hookahID)
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
        if(empty($value) || empty($this->hookahID))
            return false;

        $hookah = Hookah::where('id', $this->hookahID)->first();

        if(!$hookah)
            return false;

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
        return ':attribute wrong with hookah';
    }
}
