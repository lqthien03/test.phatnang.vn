<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageHome extends Model
{
    use HasFactory;
    public $table = "image_homes";
    protected $fillable = [
        'image',
        'display',
    ];
    public $timestamps = false;
}
