<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'categories';
    public $translatable = ["name"];
    protected $guarded = [];

    function uploadFile($request,$image_file,$folder)
    {

        $file_name = $request->file($image_file)->getClientOriginalName();
        $request->file($image_file)->storeAs('assets/admin/',$folder.'/'.$file_name,'upload_attachments');
        return $file_name;
    }
}
