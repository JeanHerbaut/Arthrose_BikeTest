<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Product;

class BikeRequest extends FormRequest
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
            'modelNumber' => ['required'],
            'categories' => ['sometimes', 'required', 'exists:categories,name'],
            'brand' => ['sometimes','required', 'exists:brands,name'],
            'shortDesc'=> ['sometimes','required'],
            'longDesc' => ['sometimes','required'],
            'price' => ['sometimes','required', 'integer'],
            'image' => Rule::requiredIf(function () use ($request) {
                return !Product::where('modelNumber', '=', $request->modelNumber)->first();
            }),
            'sizes' => 'required',
            'distinctive_sign' => 'required',
        ];
    }
}
