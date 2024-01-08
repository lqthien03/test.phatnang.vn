<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidation extends Model
{
    use HasFactory;
    public $table = "liquidations";
    protected $fillable = [
        'tittle',
        'image',
        'content',
        'link',
        'display',
    ];
    public $timestamps = false;
}
