<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
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
		
		$rec_id = request()->route('rec_id');

        return [
            
				"firstname" => "filled|string",
				"lastname" => "filled|string",
				"nickname" => "nullable|string",
				"matno" => "nullable|string",
				"phone" => "filled|string|unique:users,phone,$rec_id,id",
				"level_id" => "filled",
				"member_type" => "filled",
				"is_active" => "filled",
				"session_start" => "nullable|date",
				"session_end" => "nullable|date",
				"expectation_msg" => "nullable",
				"is_ban" => "filled",
				"fee_paid" => "filled",
				"role" => "filled",
				"dob" => "nullable|date",
				"bio" => "nullable",
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
