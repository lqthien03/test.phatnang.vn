<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuotationList extends Model
{
    use HasFactory;
    public $table = "quotation_level1s";

    protected $fillable = [
        'tittle',
        'display',
        'seo_id',

    ];
    public $timestamps = false;
    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
}
