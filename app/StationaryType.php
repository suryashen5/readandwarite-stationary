<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationaryType extends Model
{
    protected $fillable = [
        'name','image'
    ];

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
