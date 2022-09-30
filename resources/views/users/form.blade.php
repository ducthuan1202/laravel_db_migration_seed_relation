<?php

use App\User;

/**
 * @var User $model
 * @var string $title
 */

$formUrl = $model->exists ? route('users.update', ['user'=> $model]) : route('users.store')
?>

@extends('layouts.main')

@section('title') {{ $title }} @endsection

@section('content')
    
    {{ Form::open(['method' => 'POST', 'url' => $formUrl,'class' => 'needs-validation']) }}

        <div class="card">
            <div class="card-header">
                <h2>{{ $title }}</h6>
            </div>

            <div class="card-body">

                @include('users.partials.mixin', ['model'=>$model])

                @if($model->exists)
                    @include('users.partials.edit_form', ['model'=>$model])
                @else 
                    @include('users.partials.create_form', ['model'=>$model])            
                @endif

            </div>

            <div class="card-footer text-center">
                {{ link_to(route('users.index'), 'Back', ['class' => 'btn btn-outline-secondary mx-1']) }}

                {{ Form::submit('Submit', ['class' => 'btn btn-info']) }}
            </div>

        </div>

    {{ Form::close() }}

@endsection