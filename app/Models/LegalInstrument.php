<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LegalInstrument extends Model
{
    protected $guarded = [];


    public function category(): BelongsTo
    {
        return $this->belongsTo(CaseLawCategory::class, 'caselaw_category_id');
    }

     public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            CaseLawCategory::class,
            'legal_instrument_category_pivot',
            'legal_instrument_id',
            'category_id'
        );
    }

}
