<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            //
            'name'=> 'required | max:50',
            'email'=> 'required',
            'photo_id' => 'required',
            'role_id' => 'required'
        ];
    }

    public function messages(){

        return [

            'role_id.required' => 'The role is required',
            'photo_id.required' => 'Passport is required'

        ];
    }
}