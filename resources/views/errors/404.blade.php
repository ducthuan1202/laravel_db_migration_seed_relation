@extends('layouts.main')

@section('title') 404 - Page Not Found @endsection

@section('content')
    <div class="text-center">
        <h1>404 - Page Not Found</h1>
        <h2>{{ $exception->getMessage() }}</h2>
    </div>
@endsection