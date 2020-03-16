<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //

    protected $fillable = ['city', 'city_tr'];

    public function ciscos()
    {
      return $this->hasMany(Cisco::class);
    }

}
