<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Ratingdetail extends Model
{
    use HasTranslations;
    public $translatable = ['value'];

    public function rating()
    {
        return $this->belongsTo('App\Rating');
    }
}
