@extends('layouts.main')

@section('title') Admin Login @endsection

@section('content')

{{ Form::open([
    'method' => 'POST', 
    'url' => route('auth_admin.login'), 
    'class' => 'needs-validation',
]) }}

<div class="card">
    <div class="card-header">
        <h2>Admin Login form</h6>
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