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
            'name.required'             => __('lang.nameIsRequired'),
            'email.required'            => __('lang.emailIsRequired'),
            'email.email'               => __('lang.correctMail'),
            'password.required'         => __('lang.PasswordIsRequired'),
            'password.min'              => __('lang.NeedAtLeast6Characters'),
            'confirm_password.required' => __('lang.PasswordIsRequired'),
            'confirm_password.same'     => __('lang.2PasswordsMustBeTheSame'),
        ];
    }
}
