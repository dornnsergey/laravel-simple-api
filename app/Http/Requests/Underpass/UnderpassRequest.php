<?php

namespace App\Http\Requests\Underpass;

use Illuminate\Foundation\Http\FormRequest;

class UnderpassRequest extends FormRequest
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
        $rules = [
            'column' => ['string']
        ];

        if ($this->getMethod() === 'POST') {
            array_unshift($rules['column'], 'required');
        }

        return $rules;
    }
}
