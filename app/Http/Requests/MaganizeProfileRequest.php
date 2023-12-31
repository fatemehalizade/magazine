<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaganizeProfileRequest extends FormRequest
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
            "logo" => [
                "nullable",
                "image",
                "mimes:png,jpg,jpeg,svg",
                "max:15360"
            ],
            "name" => [
                "required",
                "string"
            ],
            "mobileNumber" => [
                "required",
                "size:13",
                "regex:/^09[0-9]+.{8}$/"
            ],
            "address" => [
                "nullable",
                "string"
            ],
            "description" => [
                "required",
                "string"
            ]
        ];
    }
}
