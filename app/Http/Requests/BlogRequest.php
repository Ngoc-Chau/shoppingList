<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required',
            'user_id' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'title.required' => __('required')

        ];
    }

    public function withValidator($validator)
    {
        // $validator->after(function($validator) {
        //     if(1 === 1) {
        //         $validator->errors()->add('xxx', 'test loi');
        //     }
        // });

    }
}
