<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function detailTransaction()
    {
        return $this->hasMany('App\DetailTransaction');
    }
}
