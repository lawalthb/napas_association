<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContestVotesAddRequest extends FormRequest
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
            
				"email" => "nullable|email",
				"category_id" => "required",
				"candidate_id" => "required",
				"vote_number" => "required|numeric",
				"amount" => "required|numeric",
				"payment_status" => "required",
				"ip_address" => "nullable|string",
            
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
