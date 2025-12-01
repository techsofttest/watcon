<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (is_null($model->order)) {
                $model->order = static::max('order') + 1;
            }
        });
    }


}
