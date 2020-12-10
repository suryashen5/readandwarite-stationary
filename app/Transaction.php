<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function detailTransaction()
    {
        return $this->hasMany('App\DetailTransaction');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
