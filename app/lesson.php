<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{

    protected $fillable = ['title','body'];


    public  function tags()
    {
        return $this->belongsToMany('App\Tag');

    }


}

