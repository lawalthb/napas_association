<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinalProjectsAddRequest extends FormRequest
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
            
				"row.*.user_id" => "required|numeric",
				"row.*.level_id" => "required",
				"row.*.topic1" => "nullable|string",
				"row.*.topic2" => "nullable|string",
				"row.*.topic3" => "nullable|string",
				"row.*.approve_num" => "required|numeric",
				"row.*.supervisor_topic" => "nullable|string",
				"row.*.has_submit" => "required",
            
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
