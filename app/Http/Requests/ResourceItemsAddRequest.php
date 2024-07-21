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
            
				"title" => "required|string",
				"description" => "nullable",
				"file_path" => "nullable",
				"category_id" => "required",
				"price" => "nullable|numeric",
				"download_count" => "required|numeric",
				"published" => "required",
            
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
