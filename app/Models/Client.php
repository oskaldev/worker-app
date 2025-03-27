<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $guarded = false;

  public function avatar()
  {
    return $this->morphOne(Avatar::class, 'avatarable');
  }
  public function reviews()
  {
    return $this->morphMany(Reviews::class, 'reviewable');
  }
}
