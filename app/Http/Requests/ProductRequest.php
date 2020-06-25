<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'categories' => 'required',
            'shortDesc'=> 'required',
            'longDesc' => 'required', 
            'price' => 'required',
            'brand' => 'required',
            'modelNumber' => ['required', 'unique:products'],
            'sizes' => 'required',
            'distinctive_sign' => 'required'
        ];
    }
}
