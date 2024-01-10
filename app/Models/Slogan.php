<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slogan extends Model
{
    use HasFactory;
    public $table = "slogans";
    protected $fillable = [
        'tittle',
        'display',
    ];
    public $timestamps = false;
}
