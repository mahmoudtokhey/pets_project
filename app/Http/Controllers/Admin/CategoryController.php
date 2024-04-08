<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\categories\StoreRequest;
use App\Models\Animal;

class CategoryController extends Controller
{

    // +++++++++++++++++++++++++++ mange() ++++++++++++++++++++++++++
    public function mange()
    {
        $categories = Category::all();
        return view('admin.category.mange', compact('categories'));
    }
    // +++++++++++++++++++++++++++ show_animals() ++++++++++++++++++++++++++
    public function show_animals($category_id)
    {
        $category_name = Category::select('name')->where('id', $category_id)->first();
        $category_animals = Animal::where('category_id',$category_id)->get();
        // dd($category_animals);
        return view('admin.category.show_animals',compact('category_animals','category_name'));
        // dd($category_animals);
    }
    // +++++++++++++++++++++++++++ store() +++++++++++++++++++++++++++
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
    // +++++++++++++++++++++++++++ update() +++++++++++++++++++++++++++
    public function update(Request $request)
    {
        try
        {
            // dd($request);
            // Get "Upated Category" data
            $category = Category::findOrFail($request->id);
            // +++++++++++++ update ++++++++++++++
            // update "category_name"
            $category->name = ['ar'=>$request->name_ar , 'en'=>$request->name_en];
            // Save the "old image" in variable
            $old_image = $category->image;
            // ------- update "image" : if you upload "new image" , update image -------
            if( $request->hasFile('image') )
            {
                // =================== Delete 'image' from Disk ===================
                // ======== Delete "old logo" from Disk ========
                $category->deleteFile($old_image,'uploads/categories/');
                // ================ Upload "new image" on Disk ================
                $file_path = $category->uploadFile($request,'image','uploads/categories/');
                //  Update "image name" in DB
                $category->image = $file_path ;
            }
            $category->save();
            return redirect()->route('category.mange')->with('success','تم تعديل البيانات بنجاح');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
    // +++++++++++++++++++++++++++ destroy() +++++++++++++++++++++++++++
    public function destroy(Request $request)
    {
        try
        {
            $category = Category::find($request->category_id);
            if( !empty($category) && $category != null)
            {
                $old_image = $category->image;
                // =================== Delete 'image' from DB ===================
                $category->delete();
                // =================== Delete 'image' from Disk ===================
                // check if "file" exists on Disk
                $exists = Storage::disk('upload_attachments')->exists('assets/admin/uploads/categories/'.$old_image);
                // if "file" exists on Disk , delete it
                if($exists)
                {
                    Storage::disk('upload_attachments')->delete('assets/admin/uploads/categories/'.$old_image);
                }
                return redirect()->route('category.mange')->with('success','تم الحذف بنجاح');
            }
            else
            {
                return redirect()->route('category.mange')->with('error','حدث خطا اثناء الحذف');
            }
        }
        catch( \Exception $e)
        {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
