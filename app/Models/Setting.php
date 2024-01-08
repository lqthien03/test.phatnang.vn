<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
    use HasFactory;
    public $table = "settings";
    protected $fillable = [
        'tittle',
        'address',
        'name',
        'email',
        'hotline',
        'zalo',
        'phone',
        'website',
        'fanpage',
        'map',
        'link',
        'time',
        'product_number',
        'related_product_number',
        'posts',
        'related_posts',
        'map_iframe',
        'google_analytic',
        'google_webmaster_tool',
        'head_js',
        'body_js',
        'seo_id',

    ];
    public $timestamps = false;
    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
}
