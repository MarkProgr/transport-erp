<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'country' => ['required'],
            'date_of_deal' => ['required', 'date_format:d/m/Y'],
            'deadline' => ['date_format:d/m/Y'],
            'status_of_deal' => ['required'],
            'favors' => ['required', 'array', 'min:1'],
            'favors.*' => ['required', 'exists:favors,id']
        ];
    }
}
