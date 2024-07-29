<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinalProjectsEditRequest extends FormRequest
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
            
				"user_id" => "filled",
				"level_id" => "filled",
				"topic1" => "nullable|string",
				"topic2" => "nullable|string",
				"topic3" => "nullable|string",
				"approve_num" => "filled|numeric",
				"supervisor_topic" => "nullable|string",
				"has_submit" => "filled",
            
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
