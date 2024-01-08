<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerSupport extends Model
{
    use HasFactory;

    public $table = "support_customers";
    protected $fillable = [
        'tittle',
        'display',
        'zalo',
        'phone',
    ];
    public $timestamps = false;
}
