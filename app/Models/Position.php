<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
  use HasFactory;
  protected $table = 'positions';
  // protected $fillable = [];
  protected $guarded = false;
  public function workers(): HasMany
  {
    return $this->hasMany(Worker::class);
  }
  
  public function queryWorker()
  {
    return $this->hasOne(Worker::class)->ofMany('age', 'max');
  }
}
