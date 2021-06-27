<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'ticket_type' => 'required',
            'ticket_request_type' => 'required',
            'subject' => 'required',
            'costs' => 'required',
            'date' => 'required',
            'expected_delivery_date' => 'required'
        ];
    }
}
