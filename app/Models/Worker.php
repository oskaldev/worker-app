<?php

namespace App\Models;

use App\Events\Worker\CreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Worker extends Model
{
  use HasFactory;
  protected $table = 'workers';
  // protected $fillable = [];
  protected $guarded = false;

  public static function booted()
  {
    static::created(callback: function (Worker $model) {
      event(new CreatedEvent($model));
    });
    static::updated(callback: function (Worker $model) {
      // event(new UpdatedEvent($model));
      if ($model->wasChanged() && $model->getOriginal('age') != $model->getAttributes()['age']) {
        dd('event');
      }
    });
  }
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
