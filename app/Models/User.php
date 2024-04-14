<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // ++++++++++++++++++++++ upload File ++++++++++++++++++++++
    function uploadFile($request,$image_file,$folder)
    {

        $file_name = $request->file($image_file)->getClientOriginalName();
        $request->file($image_file)->storeAs('assets/users/',$folder.'/'.$file_name,'upload_attachments');
        return $file_name;
    }
    // +++++++++++++++++++ deleteFile() function +++++++++++++++++++++++
    function deleteFile($name,$folder)
    {
        // check if "file" exists on Disk
        $exists = Storage::disk('upload_attachments')->exists('assets/users/'.$folder.'/'.$name);
        // if "file" exists on Disk , delete it
        if($exists)
        {
            Storage::disk('upload_attachments')->delete('assets/users/'.$folder.'/'.$name);
        }
    }
}
