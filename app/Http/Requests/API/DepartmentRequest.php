<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name' => ['string', 'required', 'min:2']
        ];
    }

    public function messages()
    {
        return [
            'name.string' => "The department name must be a string",
            'name.required' => "The department name is required",
            'name.min' => "The department name must be at least 2 characters...",
        ];
    }
}
