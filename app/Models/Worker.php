<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Worker extends Model
{
  protected $table = 'workers';
  // protected $fillable = [];
  protected $guarded = false;

  public function profile(): HasOne
  {
    return $this->hasOne(Profile::class);
  }
  public function position(): BelongsTo
  {
    return $this->belongsTo(Position::class);
  }
  public function projects(): BelongsToMany
  {
    return $this->belongsToMany(Project::class);
  }

  public function avatar()
  {
    return $this->morphOne(Avatar::class, 'avatarable');
  }
  public function reviews()
  {
    return $this->morphMany(Reviews::class, 'reviewable');
  }
  public function tags()
  {
    return $this->morphToMany(Tag::class, 'taggable');
  }
  public function scopeByAge($query, $age)
  {
    return $query->where('age', $age);
  }
}
