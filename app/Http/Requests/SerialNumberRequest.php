<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class SerialNumberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'serial_number' => 'required|string|max:255',
        ];
    }

    public function validated()
    {
         return $this->validate($this->rules());
    }
}
