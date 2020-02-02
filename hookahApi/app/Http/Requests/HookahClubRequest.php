<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HookahClubRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique|max:50',
            'description' => 'field|max:255'
        ];
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->request->only(['name', 'description']);
    }
}
