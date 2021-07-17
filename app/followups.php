<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class followups extends Model
{
    protected $guarded = [];

    public function member()
  {
    return $this->belongsTo('App\members', 'member_id');
  }
}
