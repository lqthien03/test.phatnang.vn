<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuotationTable extends Model
{
    use HasFactory;
    public $table = "quotations";
    protected $fillable = [
        'tittle',
        'link',
        'unit_price',
        'wholesale_price',
        'guarangee',
        'display',
        'quotation_level1_id',
        'seo_id',

    ];
    public $timestamps = false;
    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
    public function quotation_level1(): BelongsTo
    {
        return $this->belongsTo(QuotationList::class);
    }
}
