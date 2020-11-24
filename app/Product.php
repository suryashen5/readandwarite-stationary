<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','stock','price','description','image'
    ];

    public function stationaryType()
    {
        return $this->belongsTo('App\StationaryType');
    }

    public function cart()
    {
        return $this->hasMany('App\Cart');
    }

    public function detailTransaction()
    {
        return $this->hasMany('App\DetailTransaction');
    }
}
