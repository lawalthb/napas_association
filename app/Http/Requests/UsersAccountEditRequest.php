<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersAccountEditRequest extends FormRequest
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
            
				"firstname" => "filled|string",
				"lastname" => "nullable|string",
				"nickname" => "nullable|string",
				"matno" => "nullable|string",
				"phone" => "filled|string",
				"level" => "nullable|string",
				"member_type" => "filled|string",
				"expectation_msg" => "nullable",
				"session_start" => "nullable|string",
				"session_end" => "nullable|string",
				"is_active" => "filled|string",
				"is_ban" => "filled|string",
				"fee_paid" => "filled|string",
				"role" => "filled|string",
				"bio" => "nullable",
				"dob" => "nullable|date",
				"image" => "nullable",
				"facebook_link" => "nullable|string",
				"x_link" => "nullable|string",
				"linkedin_link" => "nullable|string",
            
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
