<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CaseLaw extends Model
{
    protected $guarded =[];


     public function category(): BelongsTo
    {
        return $this->belongsTo(CaseLawCategory::class, 'caselaw_category_id');
    }

     public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function orderType()
    {
        return $this->belongsTo(TypeOfOrder::class, 'type_of_order_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            CaseLawCategory::class,
            'caselaw_category_pivot',  // your pivot table
            'caselaw_id',                // FK to caselaws
            'category_id'         // FK to categories
        );
    }


}

