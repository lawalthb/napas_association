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
          "captcha" => [
            'required',
            function ($attribute, $value, $fail) {
                $num1 = request('captcha_num1');
                $num2 = request('captcha_num2');

                // Verify the numbers match what's in the session
                if ($num1 != session('captcha_num1') || $num2 != session('captcha_num2')) {
                    $fail('Security verification failed. Please try again.');
                    return;
                }

                // Check if the answer is correct
                if ((int)$value !== ((int)$num1 + (int)$num2)) {
                    $fail('The answer to the security question is incorrect.');
                }
            },
        ],
    

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
