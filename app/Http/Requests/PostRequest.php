<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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

            'title'=> 'bail | required |max:200 |unique:posts',
            'body'=> 'bail | required |max:1255',
            'status'=> 'required',
            'photo_id'=> 'required',
            'category_id'=> 'required'
        ];
    }

    public function messages(){
        return[
            'photo_id.required'=> 'Post image is required',
            'category_id.required'=> 'Category type is required'

        ];
    }
}
