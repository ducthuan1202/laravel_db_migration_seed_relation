<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use App\User;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class UserController extends Controller
{

    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        
        return $this->userService->index();
    }

    public function show(User $user)
    {
        return view('users.detail', [
            'title' => 'user detail',
            'user' => $user,
        ]);
    }

    public function create()
    {
        $user = new User();

        // $errors = new MessageBag([
        //     'name' => 'sai lam',
        //     'email' => 'invalid',
        // ]);

        // $virtualError = new ViewErrorBag();
        // $virtualError->put('default', $errors);

        return view('users.form', [
            'title' => 'Create user',
            'model' => $user,
        ]);
        // ->withErrors($virtualError->getBag('default'));
    }

    public function store(UserCreateRequest $request)
    {
        return $this->userService->create($request);
    }

    public function edit(User $user)
    {
        return view('users.form', [
            'title' => 'Edit user',
            'model' => $user,
        ]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        return $this->userService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->userService->delete($id);
    }
}
