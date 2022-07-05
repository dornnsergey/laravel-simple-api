<?php

namespace App\Http\Requests\Line;

use Illuminate\Foundation\Http\FormRequest;

class LineRequest extends FormRequest
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
            'color' => ['max:255', 'unique:lines,color,' . $this->line?->id],
            'length' => ['numeric'],
        ];

        if ($this->getMethod() === 'POST') {
            array_unshift($rules['color'], 'required');
            array_unshift($rules['length'], 'required');
        }

        return $rules;
    }
}
