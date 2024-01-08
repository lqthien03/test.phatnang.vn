<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category_level2 extends Model
{
    use HasFactory;
    public $table = "category_level2s";
    protected $fillable = [
        'image',
        'tittle',
        'display',
        'seo_id',
        'category_level1_id',
    ];
    public $timestamps = false;
    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
    public function category_level1(): BelongsTo
    {
        return $this->belongsTo(Category_level1::class);
    }
}
