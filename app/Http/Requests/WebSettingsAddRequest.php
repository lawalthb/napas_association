<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebSettingsAddRequest extends FormRequest
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
            
				"top_bar" => "nullable",
				"header" => "nullable",
				"slider" => "nullable",
				"vission" => "nullable",
				"cta" => "nullable",
				"about" => "nullable",
				"count" => "nullable",
				"benefit" => "nullable",
				"resources" => "nullable",
				"registration" => "nullable",
				"event" => "nullable",
				"testimonial" => "nullable",
				"excos" => "nullable",
				"gallery" => "nullable",
				"pricing" => "nullable",
				"faq" => "nullable",
				"contact" => "nullable",
				"footer" => "nullable",
				"user_id" => "required",
				"maintenance" => "nullable",
				"maintenance_text" => "nullable",
            
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
