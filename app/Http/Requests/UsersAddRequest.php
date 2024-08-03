<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersAddRequest extends FormRequest
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
            
				"firstname" => "required|string",
				"lastname" => "required|string",
				"nickname" => "nullable|string",
				"email" => "required|email|unique:users,email",
				"password" => "required|same:confirm_password",
				"matno" => "nullable|string",
				"phone" => "required|string|unique:users,phone",
				"level_id" => "required",
				"member_type" => "required",
				"session_start" => "nullable|date",
				"session_end" => "nullable|date",
				"user_role_id" => "nullable",
            
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
