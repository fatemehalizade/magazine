<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "image" => [
                "nullable",
                "image",
                "mimes:png,jpg,jpeg,svg",
                "max:15360"
            ],
            "firstName" => [
                "required",
                "string"
            ],
            "lastName" => [
                "required",
                "string"
            ],
            "email" => [
                "required",
                "unique:users,email,".$this->id,
                "regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix"
            ],
            "mobileNumber" => [
                "required",
                "size:13",
                "regex:/^09[0-9]+.{8}$/",
                "unique:users,mobile_number,".$this->id
            ],
            "username" => [
                "required",
                "string",
                "unique:users,username,".$this->id
            ],
            "password" => $this->id == NULL ? [
                "required",
                "min:8",
                "max:20",
                "regex:/[a-z]/",
                "regex:/[A-Z]/",
                "regex:/[0-9]/",
                "regex:/[@$%*#&]/",
                "confirmed"
            ] : [
                "nullable",
                "min:8",
                "max:20",
                "regex:/[a-z]/",
                "regex:/[A-Z]/",
                "regex:/[0-9]/",
                "regex:/[@$%*#&]/",
                "confirmed"
            ],
            "description" => [
                "nullable",
                "string",
                "max:250"
            ]
        ];
    }
}
