<?php

namespace App\Http\Requests\Api\Favor;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['required', 'min:10'],
            'sending_point' => ['required'],
            'destination_point' => ['required'],
            'cost' => ['required', 'decimal:2'],
            'transport' => ['required', 'exists:transports,id']
        ];
    }
}
