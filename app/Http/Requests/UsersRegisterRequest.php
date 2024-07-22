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
            
				"firstname" => "required|string|unique:users,firstname",
				"lastname" => "nullable|string",
				"phone" => "required|string|unique:users,phone",
				"email" => "required|email|unique:users,email",
				"password" => "required|same:confirm_password",
				"level_id" => "nullable",
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
