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
            
				"row.*.user_id" => "required",
				"row.*.level_id" => "required",
				"row.*.topic1" => "nullable|string",
				"row.*.topic2" => "nullable|string",
				"row.*.topic3" => "nullable|string",
				"row.*.supervisor_topic" => "nullable|string",
            
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
