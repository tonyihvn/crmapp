<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    protected $guarded = [];

  public function followups()
  {
    return $this->hasMany('App\followups', 'member_id');
  }

  public function assignedto()
  {
    return $this->hasOne('App\members', 'assignedto');
  }

}
