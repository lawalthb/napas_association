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
            
				"firstname" => "filled|string|unique:users,firstname,$rec_id,id",
				"lastname" => "nullable|string",
				"nickname" => "nullable|string",
				"matno" => "nullable|string",
				"phone" => "filled|string",
				"level" => "nullable|string",
				"member_type" => "filled",
				"expectation_msg" => "nullable",
				"session_start" => "nullable|string",
				"session_end" => "nullable|string",
				"is_active" => "filled",
				"is_ban" => "filled",
				"fee_paid" => "filled",
				"role" => "filled",
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
