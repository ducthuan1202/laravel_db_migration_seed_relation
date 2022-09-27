<?php

use App\User;

/**
 * @var User $model
 */

?>

<div class="form-group">
    {{ Form::label('password', Arr::get(User::labels(), 'password')) }}
    {{ Form::password('password', ['class' => 'form-control '. ($errors->has('password') ? 'is-invalid' : '') ]) }}
    @if ($errors->has('password'))
    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
    @endif
</div>

<div class="form-group" data-hint="Password confirmation">
    {{ Form::label('password_confirmation', 'Password confirmation') }}
    {{ Form::text('password_confirmation', '', ['class' => 'form-control '. ($errors->has('password') ? 'is-invalid' : '') ]) }}
</div>