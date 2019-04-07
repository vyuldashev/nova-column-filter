<?php

declare(strict_types=1);

namespace Vyuldashev\NovaColumnFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class ColumnFilter extends Filter
{
    public $component = 'column-filter';
    public $column = 'id';

    /**
     * Apply the filter to the given query.
     *
     * @param Request $request
     * @param Builder $query
     * @param mixed $value
     * @return Builder|mixed
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where($this->column, '=', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param Request $request
     * @return array
     */
    public function options(Request $request): array
    {
        return [
            'column' => $this->column,
        ];
    }
}
