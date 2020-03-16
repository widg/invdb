<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vlan extends Model
{
    //
    protected $fillable = ['cisco_id', 'vlan', 'ip_address'];

    public function ciscos()
    {
    	return $this->belongsTo(Cisco::class);
    }

}
