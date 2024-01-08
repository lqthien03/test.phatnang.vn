<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category_level3 extends Model
{
    use HasFactory;
    public $table = "category_level3s";
    protected $fillable = [
        'image',
        'tittle',
        'display',
        'seo_id',
        'category_level1_id',
        'category_level2_id',
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
    public function category_level2(): BelongsTo
    {
        return $this->belongsTo(Category_level2::class);
    }
}
