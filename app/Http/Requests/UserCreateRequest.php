<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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

        $pwdMask = '/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/';
        $pwdMask = '/^[a-zA-Z0-9]{6,12}$/';
        return [
            'name' => 'required|min:6|max:20',
            'email' => 'required|unique:users|email',
            'password' => 'required|regex:'.$pwdMask.'|confirmed',
        ];
    }
}
