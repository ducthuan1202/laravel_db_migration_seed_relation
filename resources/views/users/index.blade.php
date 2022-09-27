<?php

use App\User;

/**
 * @var User $model
 * @var string $title
 */

?>

@extends('layouts.main')

@section('title'){{ $title }}@endsection

@section('content')
    <h2>User List</h2>
    
    @if($users->isNotEmpty())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="{{ route('users.show', $user) }}" class="">
                            {{ $user->email }}
                        </a>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-info">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div>No data</div>
    @endif
    {{ link_to(route('users.create'), 'Create new', ['class' => 'btn btn-outline-secondary'], true) }}

@endsection