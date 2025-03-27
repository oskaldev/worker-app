<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
  protected $guarded = false;

  public function reviewable()
  {
    return $this->morphTo();
  }
}
