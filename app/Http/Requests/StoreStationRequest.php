<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStationRequest extends FormRequest
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
            'name'         => ['required', 'max:255', 'unique:stations,name'],
            'line_id'      => ['required', 'exists:lines,id'],
            'previous'     => ['exists:stations,id'],
            'next'         => ['exists:stations,id'],
            'underpass_id' => ['exists:underpasses,id']
        ];
    }
}
