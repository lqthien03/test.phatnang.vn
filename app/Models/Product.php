<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    public $table = "products";
    protected $fillable = [
        'image',
        'tittle',
        'link',
        'content',
        'describe',
        'outstand',
        'display',
        'code_product',
        'discount',
        'price',
        'new_price',
        'level1_product_id',
        'level2_product_id',
        'level3_product_id',
        'tag_product_id',
        'seo_id',
    ];
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
    public function category_level3(): BelongsTo
    {
        return $this->belongsTo(Category_level3::class);
    }
    public function tag_product(): BelongsTo
    {
        return $this->belongsTo(Tag_Product::class);
    }
    public $timestamps = false;
}
