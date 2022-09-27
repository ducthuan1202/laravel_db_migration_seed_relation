<?php

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\ViewErrorBag;

if (!function_exists('textInput')) {

    function getUserInputs(User $model, ViewErrorBag $errors)
    {

        $attributesLabel = User::labels();

        $nameKey = 'name';
        $emailKey = 'email';
        $passwordKey = 'password';

        return [
            $nameKey => [
                'label' => Arr::get($attributesLabel, $nameKey),
                'value' => old($nameKey, $model->getAttribute($nameKey)),
                'options' => ['class' => getInputClassWithError($errors, $nameKey)]
            ],
            $emailKey => [
                'label' => Arr::get($attributesLabel, $emailKey),
                'value' => old($emailKey, $model->getAttribute($emailKey)),
                'options' => ['class' => getInputClassWithError($errors, $emailKey)]
            ],
            $passwordKey => [
                'type' => 'password',
                'label' => Arr::get($attributesLabel, $passwordKey),
                'options' => ['class' => getInputClassWithError($errors, $passwordKey)],
            ],
            'password_confirmation' => [
                'type' => 'password',
                'feedback' => false,
                'label' => Arr::get($attributesLabel, 'password_confirmation'),
                'options' => ['class' => getInputClassWithError($errors, $passwordKey)],
            ],
        ];

    }
}

if (!function_exists('getInputClassWithError')) {

    function getInputClassWithError(ViewErrorBag $errors, $key)
    {
        
        $cls = [config('constant.class.form_control')];
        if($errors->has($key)){
            $cls[] = config('constant.class.is_invalid');
        }

        return join(' ', $cls);
    }
}
