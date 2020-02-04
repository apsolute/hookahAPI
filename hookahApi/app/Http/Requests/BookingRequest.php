<?php

namespace App\Http\Requests;

use App\Http\Requests\BookingRules\HookahCustomersCheck;

class BookingRequest extends HookahApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hookah_id' => 'required|exists:hookahs,id',
            'customer_name' => 'required|min:3|max:50',
            'customers_count' => ['required', 'int', new HookahCustomersCheck($this->hookah_id)],
            'date_time' => 'required|',
        ];
    }
}
