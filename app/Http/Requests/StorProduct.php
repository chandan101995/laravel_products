<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UpperCase;

class StorProduct extends FormRequest
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
			'name' => ['required', 'unique:products', 'max:255', new UpperCase],
			'price' => 'required | between:1,100',
			'title' => 'required',
			'user_name' => 'required',
			'description' => 'required'
		];
    }
    
    /* 
    * Get the validation error messages that apply to the request
    */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.unique' => 'The product name already exists.',
            'price.required' => 'Price is required!',
            'title.required' => 'Title is required!',
            'user_name.required' => 'User Name is required!',
            'description.required' => 'Description is required!'
        ];
    }
}
