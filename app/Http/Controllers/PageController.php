<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function forAdmin()
    {

        return response(auth()->user(), 200);
        
        $adminId = Auth::guard('admin')->id();
        $id = auth()->id();
        $id = auth()->guard('admin')->id();

        dump($adminId, $id);

        // Auth::guard('admin')->user() === auth()->user()
        dump(Auth::guard('admin')->user()->email);
        dd(auth()->user()->email);

        return 'for Admin Gaurd';
    }

    public function forMember()
    {
        return response([
            'id' => 1,
            'user'=> auth()->user(),
        ], 200);

        $id = auth()->id();
        dump($id);
        dd(auth()->user()->email);
        return 'for User Gaurd';
    }

    public function request()
    {
        $users = Http::get('https://jsonplaceholder.typicode.com/users');        
        dump($users->json());

        $users = Http::post('https://jsonplaceholder.typicode.com/users');
        dump($users->json());

        return 'request';
    }
}
