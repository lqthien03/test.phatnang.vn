<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;

class Category_level1 extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public $table = "category_level1s";
    protected $fillable = [
        'image',
        'tittle',
        'describe',
        'outstand',
        'display',
        'seo_id',
    ];
    public $timestamps = false;
    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
}
