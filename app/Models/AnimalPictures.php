<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalPictures extends Model
{
    use HasFactory;
    protected $table = 'animal_pictures';
    protected $fillable = ["animal_id","file_name"];
}
