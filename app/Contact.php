<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
class Contact extends Model
{
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
   
}
