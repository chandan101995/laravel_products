<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UpdateProduct extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' =>[                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                'required',
                Rule::unique('products', 'name')->ignore($request->id),
            ],
			'price' => 'required|',
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
            'name.unique' => 'The product name  is already exist!',
            'price.required' => 'Price is required!',
            'description.required' => 'Description is required!'
        ];
    }
}
