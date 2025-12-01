<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Publication extends Model
{
     protected $guarded = [];

     protected static function booted()
    {
        static::creating(function ($model) {

     if (empty($model->slug) && !empty($model->title)) {
            $model->slug = Str::slug($model->title);
        }

        });


     static::updating(function ($model) {
        if ($model->isDirty('title')) {
            $model->slug = Str::slug($model->title);
        }

    });


    }

}
