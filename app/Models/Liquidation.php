<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'seo_id'
    ];
    public $timestamps = false;
    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
}
