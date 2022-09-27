<?php 

use App\User;
use Illuminate\Support\Arr;

$attributes = Arr::except($user->getAttributes(), ['password'])
?>

@extends('layouts.main')

@section('title'){{ $title }}@endsection

@section('content')
    <h2>User List</h2>
    
    <table class="table table-bordered table-striped">
        <tbody>
            @foreach($attributes as $key => $value)
            <tr>
                <td>{{ Arr::get(User::labels(), $key) }}</td>
                <td>{{ $value }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection