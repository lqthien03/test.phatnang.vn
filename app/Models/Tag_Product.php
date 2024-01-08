<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag_Product extends Model
{
    use HasFactory;
    public $table = "tag_products";
    protected $fillable = [
        'image',
        'tittle',
        'display',
        'outstand',
        'link',
        'seo_id',
    ];
    public $timestamps = false;
    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
}
