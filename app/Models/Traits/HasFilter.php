<?php

namespace App\Models\Traits;

use App\Http\Filters\Filter1\AbstractFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;

trait HasFilter
{
  public function scopeFilter(Builder $builder, AbstractFilter $filter)
  {
    $filter->applyFilter($builder);
    return $builder;
  }
}
