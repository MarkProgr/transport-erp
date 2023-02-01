<?php

namespace App\Http\Requests\Driver;

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
            'surname' => ['required'],
            'age' => ['required', 'numeric'],
            'status' => ['required'],
            'category' => ['required'],
            'transport' => ['required', 'exists:transports,id'],
            'email' => ['required', 'email:rfc']
        ];
    }
}
