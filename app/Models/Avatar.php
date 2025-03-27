<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
  protected $guarded = false;
  
  public function avatarable()
  {
    return $this->morphTo();
  }
}
