<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $table = 'profiles';
  // protected $fillable = [];
  protected $guarded = false;
  
  public function worker()
  {
    return $this->belongsTo(Worker::class, 'worker_id', 'id');
  }
}
