<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    public $table = "criterias";
    protected $fillable = [
        'image',
        'tittle',
        'describe',
        'display',
    ];
    public $timestamps = false;
}
