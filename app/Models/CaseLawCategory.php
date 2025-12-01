<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\CaseLaw;
use App\Models\LegalInstrument;

class CaseLawCategory extends Model
{

    protected $table = 'db_categories';

    protected $guarded = [];



    public function caseLaws()
    {
        return $this->belongsToMany(
            CaseLaw::class,
            'caselaw_category_pivot',
            'category_id',
            'caselaw_id'
        );
    }

    public function legalInstruments()
    {
        return $this->belongsToMany(
            LegalInstrument::class,
            'legal_instrument_category_pivot',
            'category_id',
            'legal_instrument_id'
        );
    }

}
