<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Campaign extends Model
{
    use HasTranslations;
    public $translatable = ['name', 'question', 'comingback'];

    public function rating()
    {
        return $this->belongsTo('App\Rating');
    }

}
