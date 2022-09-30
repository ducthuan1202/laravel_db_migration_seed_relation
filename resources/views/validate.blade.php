<?php

dump(old());
?>

@extends('layouts.main')

@section('title') Validate data @endsection

@section('content')
    
    {{ Form::open(['method' => 'POST', 'url' => route('issue.validate'),'class' => 'needs-validation']) }}

        <div class="card">
            <div class="card-header">
                <h2>Validate data</h6>
            </div>

            <div class="card-body">

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', old('name', ''), ['class' => 'form-control']) }}
                @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>


            <div class="form-group">
                {{ Form::label('age', 'Age') }}
                {{ Form::text('age', old('age', ''), ['class' => 'form-control']) }}
                @if ($errors->has('age'))
                <div class="invalid-feedback">{{ $errors->first('age') }}</div>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('is_active', 'Is Activate') }}
                {{ Form::checkbox('is_active', old('is_active', ''), false) }}
            </div>

            </div>

            <div class="card-footer text-center">

                {{ Form::submit('Submit', ['class' => 'btn btn-info']) }}
            </div>

        </div>

    {{ Form::close() }}

@endsection