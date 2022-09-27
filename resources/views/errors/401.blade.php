<?php

use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

/**
 * @var UnauthorizedHttpException $exception
 */

?>

@extends('layouts.main')

@section('title') 401 - Unauthorized @endsection

@section('content')
    <div class="text-center">
        <h1>401 - Unauthorized</h1>
        <h2>{{ $exception->getMessage() }}</h2>
    </div>
@endsection