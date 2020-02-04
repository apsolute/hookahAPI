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
            'name' => 'required|min:3|max:50|unique:hookahs,name,NULL,id,hookah_club_id,'.$this->hookah_club_id,
            'pipes_count' => 'required|integer|min:1|max:8'
        ];
    }
}
