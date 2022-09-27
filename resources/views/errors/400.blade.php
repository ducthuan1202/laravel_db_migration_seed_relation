@extends('layouts.main')

@section('title') 400 - Bad request @endsection

@section('content')
    <div class="text-center">
        <h1>400 - Bad request</h1>
        <h2>{{ $exception->getMessage() }}</h2>
    </div>
@endsection