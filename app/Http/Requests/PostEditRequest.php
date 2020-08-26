<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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

            'title'=> 'bail | required |max:20 |unique:posts',
            'body'=> 'bail | required |max:1200',
            'status'=> 'required',
            'category_id'=> 'required',

        ];
    }

    public function messages(){
        return[
            'category_id.required'=> 'Category type is required'

        ];
    }
}
