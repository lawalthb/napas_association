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
            
				"academic_session" => "filled",
				"category_id" => "filled",
				"user_id" => "filled",
				"name" => "filled|string",
				"vote_link" => "nullable",
				"votes" => "filled|numeric",
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
