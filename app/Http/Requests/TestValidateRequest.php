<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestValidateRequest extends FormRequest
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
            'name'=> 'max:12',
            'is_active'=>'nullable',
            'age'=>[
                'required_if:is_active,==,on',
                'numeric',
                'min:1',
                'max:18'
            ],
        ];
    }
}
