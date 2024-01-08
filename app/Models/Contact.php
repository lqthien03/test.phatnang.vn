<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    public $table = "support_customers";
    protected $fillable = [
        'content',
        'image',
        'display',
        'seo_id',
    ];
    public $timestamps = false;

    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
}
