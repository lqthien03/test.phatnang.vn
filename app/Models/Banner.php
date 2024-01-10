<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public $table = "banners";
    protected $fillable = [
        'tittle',
        'image',
        'link',
        'display',
    ];
    public $timestamps = false;
}
