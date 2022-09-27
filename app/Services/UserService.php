<?php

namespace App\Services;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;

class UserService
{
    public function index()
    {
        $users = User::paginate();
        return view('users.index', [
            'title' => 'List users',
            'users' => $users,
        ]);
    }

    public function create(UserCreateRequest $request)
    {
        dd($request->validated());
        return redirect()
            ->route('users.index')
            ->with('success', 'Successfully');
    }

    public function detail()
    {
    }

    public function update(UserUpdateRequest $request, $id)
    {
        dd($request->validated());

        return redirect()
            ->route('users.index')
            ->with('success', 'Successfully');
    }

    public function delete($id)
    {
        return redirect()
            ->route('users.index')
            ->with('success', 'Successfully');
    }
}
