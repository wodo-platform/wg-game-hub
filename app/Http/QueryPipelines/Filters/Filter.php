<?php

namespace App\Http\QueryPipelines\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Filter
{
    public function __construct(
        protected string $column,
        protected ?Request $request = null,
        protected ?string $queryParamName = null,
    ) {
    }

    abstract public function handle(Builder $builder, Closure $next): mixed;

    public function getParam(): string
    {
        return $this->queryParamName ?? $this->column;
    }
}
