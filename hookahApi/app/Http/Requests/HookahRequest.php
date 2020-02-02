<?php

namespace App\Http\Requests;


class HookahRequest extends HookahApiRequest
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
            'hookah_club_id' => 'required|exists:hookah_clubs,id',
            'name' => 'required|unique:hookahs|max:50'
        ];
    }
}
