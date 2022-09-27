<?php

namespace App\Http\Requests;

use App\Rules\CustomerEmailWhiteListRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        // get param route by name
        $userId = $this->route('user');

        return [
            'name' => ['required', 'min:6', 'max:20'],
            'email' => [
                'required',
                new CustomerEmailWhiteListRule(),
                Rule::unique('users', 'email')->ignore($userId, 'id'),
            ],

            // 'name' => 'required|min:6|max:20',
            // 'email' => 'required|email|unique:users,email,' . $userId . ',id',
        ];
    }
}
