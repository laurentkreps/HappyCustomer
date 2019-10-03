<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function ratingdetails()
    {
        return $this->hasMany('App\Ratingdetail');
    }
    public function campaigns()
    {
        return $this->hasMany('App\Campaign');
    }
}
