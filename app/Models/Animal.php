<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'animals';
    public $translatable = ["name","introduce_animal","animal_characteristics","dietary_preference","care_requirements","health_recommendations"];
    protected $guarded = [];
    // ++++++++++++++++++++++ upload File ++++++++++++++++++++++
    function uploadFile($request,$image_file,$folder)
    {

        $file_name = $request->file($image_file)->getClientOriginalName();
        $request->file($image_file)->storeAs('assets/admin/',$folder.'/'.$file_name,'upload_attachments');
        return $file_name;
    }
    // +++++++++++++++++++ deleteFile() function +++++++++++++++++++++++
    function deleteFile($name,$folder)
    {
        // check if "file" exists on Disk
        $exists = Storage::disk('upload_attachments')->exists('assets/admin/'.$folder.'/'.$name);
        // if "file" exists on Disk , delete it
        if($exists)
        {
            Storage::disk('upload_attachments')->delete('assets/admin/'.$folder.'/'.$name);
        }
    }
    // +++++++++++++++++++ Relationship : many to 1 : animal and category  +++++++++++++++++++++++
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
