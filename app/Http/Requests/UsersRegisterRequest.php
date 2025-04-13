<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {

        return [
        "firstname" => "required|string|regex:/^[a-zA-Z\s]+$/",
        "lastname" => "nullable|string|regex:/^[a-zA-Z\s]+$/",
        "phone" => "required|string|unique:users,phone|regex:/^[0-9]{10,15}$/",
        "email" => "required|email|unique:users,email",
        "password" => "required|min:8",
        "level_id" => "nullable",
        "matno" => [
            "required",
            "string",
            "regex:/^[A-Z]{4}\/[0-9]{2}\/[0-9]{4}$/"
        ],
        "member_type" => "required",
        "expectation_msg" => "nullable",

    ];
}

	public function messages()
    {
        return [

            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
