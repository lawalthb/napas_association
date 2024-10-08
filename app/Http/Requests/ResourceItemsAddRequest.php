<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceItemsAddRequest extends FormRequest
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
            
				"category_id" => "required",
				"title" => "required|string",
				"description" => "nullable",
				"file_path" => "nullable",
				"price" => "nullable|numeric",
				"published" => "required",
				"file_type" => "nullable",
            
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
