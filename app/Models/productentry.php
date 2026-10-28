<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productentry extends Model
{
    protected $guarded = [];

    /**
     * Returns the price as a clean float (strips text like "300 rs" → 300.0)
     */
    public function getNumericPriceAttribute(): float
    {
        return (float) preg_replace('/[^0-9.]/', '', $this->price ?? '0');
    }

    public function product()
    {
        return $this->belongsTo(productmodel::class,'pnameid','id');
    }
}
