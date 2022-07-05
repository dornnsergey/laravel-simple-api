<?php

namespace App\Http\Requests\Station;

use Illuminate\Foundation\Http\FormRequest;

class StationRequest extends FormRequest
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
            'name'         => ['max:255', 'unique:stations,name,' . $this->station?->id],
            'line_id'      => ['exists:lines,id'],
            'previous'     => ['exists:stations,id'],
            'next'         => ['exists:stations,id'],
            'underpass_id' => ['exists:underpasses,id']
        ];

        if ($this->getMethod() === 'POST') {
            array_unshift($rules['name'], 'required');
            array_unshift($rules['line_id'], 'required');
        }

        return $rules;
    }
}
