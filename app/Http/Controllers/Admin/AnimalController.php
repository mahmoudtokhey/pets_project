<?php

namespace App\Http\Controllers\Admin;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnimalPictures;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class AnimalController extends Controller
{
    // ++++++++++++++++++ index() +++++++++++++++++
    public function index()
    {
        $animals = Animal::select('*')->get();
        $categories = Category::pluck('name','id');
        return view('admin.animals.index',compact('animals','categories'));
    }
    // ++++++++++++++++++ show($id) +++++++++++++++++
    public function show($id)
    {
        $animal = Animal::select('*')->where('id',$id)->first();
        $animal_pictures = AnimalPictures::where('animal_id',$id)->get();
        // dd($animal_pictures);
        // dd($animal_pictures);
        return view('admin.animals.show',compact('animal','animal_pictures'));
    }
    // +++++++++++++++++++++++++++ store() +++++++++++++++++++++++++++
    public function store(Request $request)
    {
        try
        {
            // dd($request);
            $animal = new Animal();
            $animal->name                       = ['ar'=>$request->name_ar,'en'=>$request->name_en];
            $animal->introduce_animal           = ['ar'=>$request->introduce_animal_ar,'en'=>$request->introduce_animal_en];
            $animal->animal_characteristics     = ['ar'=>$request->animal_characteristics_ar,'en'=>$request->animal_characteristics_en];
            $animal->dietary_preference         = ['ar'=>$request->dietary_preference_ar,'en'=>$request->dietary_preference_en];
            $animal->care_requirements          = ['ar'=>$request->care_requirements_ar,'en'=>$request->care_requirements_en];
            $animal->health_recommendations     = ['ar'=>$request->health_recommendations_ar,'en'=>$request->health_recommendations_en];
            // ++++++++ Store animal image ++++++++
            if( $request->has('image') )
            {
                $file_path = $animal->uploadFile($request,'image','uploads/animals/');
                $animal->image = $file_path ;
            }
            // ++++++++ Store geographic_distribution_image ++++++++
            if( $request->has('geographic_distribution_image') )
            {
                $file_path = $animal->uploadFile($request,'geographic_distribution_image','uploads/animals/');
                $animal->geographic_distribution_image = $file_path ;
            }
            // category
            $animal->category_id = $request->category_id;
            $animal->save();
            // ++++++++ Store Multiple Image : animal_pictures images ++++++++
            if ($request->hasFile('animal_pictures'))
            {
                foreach ($request->file('animal_pictures') as $photo)
                {
                    // =========== Store image in the database ===========
                    $animalPicture = new AnimalPictures();
                    $animalPicture->file_name = $photo->getClientOriginalName(); // You may adjust this as needed
                    $animalPicture->animal_id = $animal->id; // Assuming you have the animal object available
                    $animalPicture->save();
                    // =========== Store image in the public directory ===========
                    $photo->move(public_path('assets/admin/uploads/animals'), $photo->getClientOriginalName());
                }
            }
            return redirect()->route('animals.index')->with('success', 'تم اضافة البيانات بنجاح');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
    // +++++++++++++++++++++++++++ update() +++++++++++++++++++++++++++

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        // dd($request);
        if( $request->has('introduce_animal') )
        {
            $animal->introduce_animal = $request->introduce_animal;
        }
        if( $request->has('animal_characteristics') )
        {
            $animal->animal_characteristics = $request->animal_characteristics;
        }
        if( $request->has('dietary_preference') )
        {
            $animal->dietary_preference = $request->dietary_preference;
        }
        if( $request->has('care_requirements') )
        {
            $animal->care_requirements = $request->care_requirements;
        }
        if( $request->has('health_recommendations') )
        {
            $animal->health_recommendations = $request->health_recommendations;
        }
        // +++++++++++++++ geographic_distribution_image : update one image +++++++++++++
        // "old image"
        $old_image = $animal->geographic_distribution_image;
        if( $request->has('geographic_distribution_image') )
        {
            // =================== Delete 'image' from Disk ===================
                // ======== Delete "old logo" from Disk ========
                $animal->deleteFile($old_image,'uploads/animals/');
                // ================ Upload "new image" on Disk ================
                $file_path = $animal->uploadFile($request,'geographic_distribution_image','uploads/animals/');
                $animal->geographic_distribution_image = $file_path ;
        }
        // ++++++++ animal_pictures images : Update Multiple Image ++++++++
        if ($request->has('animal_pictures'))
        {
            // Retrieve filenames of old pictures associated with the animal
            $oldPictures = AnimalPictures::where('animal_id', $animal->id)->pluck('file_name')->toArray();
            // Delete existing records for the animal ID
            AnimalPictures::where('animal_id', $animal->id)->delete();

            // ============= Upload and store new images =============
            foreach ($request->file('animal_pictures') as $photo)
            {
                // Store image in the public directory
                $imageName = $photo->getClientOriginalName(); // Generate a unique image name
                $photo->move(public_path('assets/admin/uploads/animals'), $imageName);
                // Create a new record in the animal_pictures table
                AnimalPictures::create([
                    'animal_id' => $animal->id,
                    'file_name' => $imageName,
                ]);
            }
            // ============= Delete old image files from the public folder =============
            foreach ($oldPictures as $oldPicture)
            {
                // ++++ First Way of Delete ++++
                $animal->deleteFile($oldPicture,'uploads/animals/');
                // ++++ Second Way of Delete ++++
                // $filePath = public_path('assets/admin/uploads/animals/' . $oldPicture);
                // if (File::exists($filePath))
                // {
                //     File::delete($filePath);
                // }
            }
        }
        $animal->save();
        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');

    }
    // +++++++++++++++++++++++++++ destroy() +++++++++++++++++++++++++++
    public function destroy(Request $request)
    {
        try
        {
            $animal = Animal::find($request->animal_id);
            if( !empty($animal) && $animal != null)
            {
                $old_image = $animal->image;
                // =================== Delete 'image' from DB ===================
                $animal->delete();
                // =================== Delete 'image' from Disk ===================
                // check if "file" exists on Disk
                $exists = Storage::disk('upload_attachments')->exists('assets/admin/uploads/animals/'.$old_image);
                // if "file" exists on Disk , delete it
                if($exists)
                {
                    Storage::disk('upload_attachments')->delete('assets/admin/uploads/animals/'.$old_image);
                }
                return redirect()->route('animals.index')->with('success','تم الحذف بنجاح');
            }
            else
            {
                return redirect()->route('animals.index')->with('error','حدث خطا اثناء الحذف');
            }
        }
        catch( \Exception $e)
        {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
