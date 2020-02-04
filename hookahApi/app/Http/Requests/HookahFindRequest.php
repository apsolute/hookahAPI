<?php

namespace App\Http\Requests;

use Carbon\Carbon;

class HookahFindRequest extends HookahRequest
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
            'date_from' => [
                'required',
                'date_format:Y-m-d H:i',
                'after:' . Carbon::now()->toDateTimeString(),
            ],
            'date_to' => [
                'required',
                'date_format:Y-m-d H:i',
                'after:' . $this->date_from,
            ],
            'customers_count' => 'required|int'
        ];
    }
}
