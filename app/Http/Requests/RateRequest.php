<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Criteria_Test;

class RateRequest extends FormRequest
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
        $criterias = Criteria_Test::distinct('criteria_id')->pluck('criteria_id')->toArray();
        
        foreach($criterias as $criteria){
            $rules['crit'.$criteria] = ['sometimes', 'required', 'between:1,5'];
        }
        $rules['critglobal'] = ['required', 'between:1,5'];

        return $rules;
    }
}
