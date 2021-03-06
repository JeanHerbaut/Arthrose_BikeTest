<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
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
        $userid = Auth::user()->id;
        return [
            'id' => ['required'],
            'name' => ['required', 'string', 'max:40'],
            'firstname' => ['required', 'string', 'max:40'],
            'username' => ['required', 'regex:/^[A-Za-z0-9-]+$/', 'min: 3', 'max:16', 'unique:users,username,'.$userid],
        ];
    }
}
