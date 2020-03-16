<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cisco extends Model
{
    //
    protected $fillable = [
      'city_id', 
      'hostname', 
      'type', 
      'dmvpn', 
      'ip_external', 
      'comment', 
      'tpm_enable', 
      'tpm_radius_hm', 
      'tpm_radius_dc', 
      'status', 
      'note'
    ];

    public function city()
    {
    	return $this->belongsTo(City::class);
    }
    public function vlans()
    {
      return $this->hasMany(Vlan::class);
    }
}
