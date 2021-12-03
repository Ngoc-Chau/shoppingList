<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name'              => 'required',
            'email'             => 'required|email',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required'             => 'Vui lòng nhập họ tên',
            'email.required'            => 'Vui lòng nhập Email',
            'email.email'               => 'Vui lòng nhập đúng kiểu Email',
            'password.required'         => 'Vui lòng nhập mật khẩu',
            'password.min'              => 'Nhập tối thiểu 6 kí tự',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu',
            'confirm_password.same'     => 'Mật khẩu không khớp',
        ];
    }
}
