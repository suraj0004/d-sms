<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'mobile', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
   
}
