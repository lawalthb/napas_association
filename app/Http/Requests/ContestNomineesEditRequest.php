<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContestNomineesEditRequest extends FormRequest
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
				"name" => "filled|string",
				"category_id" => "filled",
				"academic_session" => "filled",
				"vote_link" => "nullable",
				"votes" => "filled|numeric",
				"slug" => "filled",
				"payment_status" => "filled",
            
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
