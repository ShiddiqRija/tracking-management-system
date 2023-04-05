<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PositionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'id'            => ['required'],
            'device_id'     => ['required'],
            'latitude'      => ['required'],
            'longitude'     => ['required'],
            'server_time'   => ['required'],
            'device_time'   => ['required'],
            'attributes'    => ['required'],
            'network'       => ['required'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(back()->with('error', $validator->errors())->withInput());
    }
}
