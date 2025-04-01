<?php

namespace App\Http\Filters\Filter1;

use Illuminate\Contracts\Database\Eloquent\Builder;

abstract class AbstractFilter
{
  private array $params = [];

  /**
   * Summary of __construct
   * @param array $params
   */
  public function __construct(array $params)
  {
    $this->params = $params;
  }

  public function applyFilter(Builder $builder)
  {
    foreach ($this->getCallbacks() as $key => $callback) {
      if (isset($this->params[$key])) {
        $this->$callback($builder, $this->params[$key]);
      }
    };
  }
  abstract public function getCallbacks(): array;
}
