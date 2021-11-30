<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => 'required|max:255|min:5',
            'content' => 'required',
            'create_date' => 'date',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'title.required' => 'Vui lòng nhập tiêu đề',
    //         'content.required' => 'Vui lòng nhập nội dung',
    //         'create_date.date' => 'Hãy chọn ngày giờ',
    //     ];
    // }
}
