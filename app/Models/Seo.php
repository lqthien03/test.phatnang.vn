<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    public $table = "seos";
    protected $fillable = [
        'seo_tittle',
        'seo_keyword',
        'seo_description',
    ];
    public $timestamps = false;
}
