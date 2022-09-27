<?php

use App\User;

/**
 * @var User $model
 */

$attributesLabel = User::labels();

$nameKey = 'name';
$emailKey = 'email';
?>

<div class="form-group">
    {{ Form::label($nameKey, Arr::get($attributesLabel, $nameKey)) }}
    {{ Form::text($nameKey, old($nameKey, $model->getAttribute($nameKey)), ['class' => 'form-control '. ($errors->has($nameKey) ? 'is-invalid' : '') ]) }}
    @if ($errors->has($nameKey))
    <div class="invalid-feedback">{{ $errors->first($nameKey) }}</div>
    @endif
</div>


<div class="form-group">
    {{ Form::label($emailKey, Arr::get($attributesLabel, $emailKey)) }}
    {{ Form::text($emailKey, old($emailKey, $model->getAttribute($emailKey)), ['class' => 'form-control '. ($errors->has($emailKey) ? 'is-invalid' : '') ]) }}
    @if ($errors->has($emailKey))
    <div class="invalid-feedback">{{ $errors->first($emailKey) }}</div>
    @endif
</div>