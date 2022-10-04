<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::query()
            ->with('parentCategories')
            ->get();

        // dump($categories);
        // return 'ok';

        return response()->json($categories);
    }
}
