<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    public function lessons()
    {
        return $this->man('App\lessons');
    }
}
