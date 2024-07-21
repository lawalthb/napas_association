<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContestNomineesAddRequest extends FormRequest
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
            
				"user_id" => "required",
				"name" => "required|string",
				"category_id" => "required",
				"academic_session" => "required",
				"vote_link" => "nullable",
				"votes" => "required|numeric",
				"slug" => "required",
				"payment_status" => "required",
            
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
