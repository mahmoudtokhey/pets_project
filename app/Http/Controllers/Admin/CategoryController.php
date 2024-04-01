<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categories\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function mange() {

        $categories = Category::all();
        return view('admin.category.mange', compact('categories'));

    }


    public function store(StoreRequest $request)
    {
        try
        {
            // dd($request);
            $category = new Category();
            $category->name           = ['ar'=>$request->name_ar,'en'=>$request->name_en];
            // +++++++++++++++++++++++ Store category image +++++++++++++++++++++++++++
            // upload "image" of "item"
            if( $request->has('image') )
            {
                $file_path = $category->uploadFile($request,'image','uploads/categories/');
                $category->image = $file_path ;
            }
            $category->save();
            return redirect()->route('category.mange')->with('success', 'تم اضافة البيانات بنجاح');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
