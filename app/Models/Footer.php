<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    public $table = "footers";
    protected $fillable = [
        'tittle',
        'content',
        'display',
    ];
    public $timestamps = false;
}
