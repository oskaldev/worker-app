<?php

namespace App\Http\Filters\Filter1;

use Illuminate\Database\Eloquent\Builder;

class WorkerFilter
{
  private array $params = [];

  const NAME = 'name';
  const SURNAME = 'surname';
  const EMAIL = 'email';
  const AGE_FROM = 'from';
  const AGE_TO = 'to';
  const DESCR = 'description';
  const IS_MARRIED = 'is_married';

  /**
   * Summary of __construct
   * @param array $params
   */
  public function __construct(array $params)
  {
    $this->params = $params;
  }

  public function getCallbacks(): array
  {
    return [
      self::NAME => "name",
      self::SURNAME => "surname",
      self::EMAIL => "email",
      self::AGE_FROM => "ageFrom",
      self::AGE_TO => "ageTo",
      self::DESCR => "description",
      self::IS_MARRIED => "isMarried",
    ];
  }

  public function applyFilter($builder)
  {
    foreach ($this->getCallbacks() as $key => $callback) {
      if (isset($this->params[$key])) {
        $this->$callback($builder, $this->params[$key]);
      }
    }
  }

  public function name(Builder $builder, $value)
  {
    $builder->where('name', 'like', "%{$value}%");
  }
  public function surname(Builder $builder, $value)
  {
    $builder->where('surname', 'like', "%{$value}%");
  }
  public function email(Builder $builder, $value)
  {
    $builder->where('email', 'like', "%{$value}%");
  }
  public function ageFrom(Builder $builder, $value)
  {
    $builder->where('age', '>', $value);
  }
  public function ageTo(Builder $builder, $value)
  {
    $builder->where('age', '<', $value);
  }
  public function description(Builder $builder, $value)
  {
    $builder->where('description', 'like', "%{$value}%");
  }
  public function isMarried(Builder $builder, $value)
  {
    $builder->where('is_married', (bool) $value);
  }
}
