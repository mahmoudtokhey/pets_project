<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function mange() {

        $categories = Category::all();
        return view('admin.category.mange', compact('categories'));

    }


    public function store(Request $request) {
        dd($request);
    }
}
