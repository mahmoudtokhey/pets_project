<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Marketplace extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "marketplaces";

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
}
