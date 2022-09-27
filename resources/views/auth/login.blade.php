@extends('layouts.main')

@section('title') Login @endsection

@section('content')

{{ Form::open([
    'method' => 'POST', 
    'url' => route('auth.login'), 
    'class' => 'needs-validation',
]) }}

<div class="card">
    <div class="card-header">
        <h2>User Login form</h6>
    </div>

    <div class="card-body">

        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', old('email'), ['class'=> 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('password') }}
            {{ Form::password('password', ['class'=> 'form-control']) }}
        </div>

    </div>

    <div class="card-footer text-center">
        {{ Form::submit('Submit', ['class' => 'btn btn-info']) }}
    </div>

</div>

{{ Form::close() }}

@endsection