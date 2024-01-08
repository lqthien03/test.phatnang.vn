<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favicon extends Model
{
    use HasFactory;
    public $table = "favicons";
    protected $fillable = [
        'image',
        'display',
    ];
    public $timestamps = false;
}
