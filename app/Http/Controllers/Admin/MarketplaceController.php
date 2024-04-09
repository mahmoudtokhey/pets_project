<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marketplace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarketplaceController extends Controller
{
    // ++++++++++++++++++ index() +++++++++++++++++
    public function index()
    {
        // $animals = Animal::select('*')->get();
        // $categories = Category::pluck('name','id');
        return view('admin.marketplace.index');
    }
    // +++++++++++++++++++++++++++ store() +++++++++++++++++++++++++++
    public function store(Request $request)
    {
        try
        {
            // dd($request);
            $marketplace = new Marketplace();
            $marketplace->name      = $request->name ;
            $marketplace->price     = $request->price ;
            $marketplace->phone     = $request->phone ;
            $marketplace->city      = $request->city ;
            $marketplace->category  = $request->category ;
            $marketplace->animal    = $request->animal ;
            $marketplace->comment   = $request->comment ;
            $marketplace->added_by  = auth()->user()->id ;
            // +++++++++++++++++++++++ Store marketplace image +++++++++++++++++++++++++++
            // upload "image" of "item"
            if( $request->has('image') )
            {
                $file_path = $marketplace->uploadFile($request,'image','uploads/marketplace/');
                $marketplace->image = $file_path ;
            }
            $marketplace->save();
            return redirect()->route('marketplace.index')->with('success', 'تم اضافة البيانات بنجاح');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
    // ++++++++++++++++++ show($category_type) +++++++++++++++++
    public function show($category_type)
    {
        $product       = Marketplace::select('*')->where('category',$category_type)->get();
        $product_cat   = Marketplace::select('*')->where('category',$category_type)->where('animal','Cat')->get();
        $product_dog   = Marketplace::select('*')->where('category',$category_type)->where('animal','Dog')->get();
        $product_bird  = Marketplace::select('*')->where('category',$category_type)->where('animal','Bird')->get();
        $product_other = Marketplace::select('*')->where('category',$category_type)->where('animal','Other')->get();
        // dd($product_dog);
        return view('admin.marketplace.show',compact('product','product_cat','product_dog','product_bird','product_other'));
    }
    // +++++++++++++++++++++++++++ destroy() +++++++++++++++++++++++++++
    public function destroy(Request $request)
    {
        try
        {
            $marketplace = Marketplace::find($request->product_id);
            // dd($marketplace);
            if( !empty($marketplace && $marketplace!= null) )
            {
                $old_image = $marketplace->image;
                // =================== Delete 'image' from DB ===================
                $marketplace->delete();
                // =================== Delete 'image' from Disk ===================
                // check if "file" exists on Disk
                $exists = Storage::disk('upload_attachments')->exists('assets/admin/uploads/marketplace/'.$old_image);
                // if "file" exists on Disk , delete it
                if($exists)
                {
                    Storage::disk('upload_attachments')->delete('assets/admin/uploads/marketplace/'.$old_image);
                }
                return redirect()->back()->with('success','تم الحذف بنجاح');
            }
            else
            {
                return redirect()->back()->with('error','حدث خطا اثناء الحذف');
            }
        }
        catch( \Exception $e)
        {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
