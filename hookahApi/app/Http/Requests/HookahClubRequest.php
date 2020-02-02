<?php

namespace App\Http\Requests;


class HookahClubRequest extends HookahApiRequest
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
            'name' => 'required|unique:hookah_clubs|max:50',
            'description' => 'max:255'
        ];
    }

}
