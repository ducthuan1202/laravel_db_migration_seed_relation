<?php

use App\User;

/**
 * @var User $model
 * @var string $title
 */

$inputs = getUserInputs($model, $errors);
$formUrl = $model->exists 
    ? route('users.update', ['user'=> $model]) 
    : route('users.store')
?>

@extends('layouts.main')

@section('title'){{ $title }}@endsection

@section('content')
    
@if($model->exists)
    {{ Form::open([
        'method' => 'POST', 
        'url' => route('users.update', ['user'=> $model]),
        'class' => 'needs-validation'
    ]) }}
    @method('PUT')
@else 
    {{ Form::open([
        'method' => 'POST', 
        'url' => route('users.store'),
        'class' => 'needs-validation'
    ]) }}    
@endif
<div class="card">
    <div class="card-header">
        <h2>{{ $title }}</h6>
    </div>

    <div class="card-body">

        @include('users.partials.mixin', ['model'=>$model])
        @include('users.partials.create_form', ['model'=>$model])
        @include('users.partials.edit_form', ['model'=>$model])


        @foreach ($inputs as $key => $input)
            <div class="form-group">
                {{ Form::label($key, Arr::get($input, 'label') ) }}

                @switch(Arr::get($input, 'type', 'text'))
                    @case('password')
                        {{ Form::password($key, Arr::get($input, 'options') ) }}
                        @break                                
                    @default
                        {{ Form::text($key, Arr::get($input, 'value'), Arr::get($input, 'options')) }}
                        @break
                @endswitch               

                @if ($errors->has($key) && Arr::get($input, 'feedback', true))
                    <div class="invalid-feedback">{{ $errors->first($key) }}</div>
                @endif
            </div>
        @endforeach

    </div>

    <div class="card-footer text-center">
        {{ link_to(route('users.index'), 'Back', ['class' => 'btn btn-outline-secondary mx-1']) }}

        {{ Form::submit('Submit', ['class' => 'btn btn-info']) }}
    </div>

</div>

{{ Form::close() }}

@endsection