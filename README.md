# Column Filter for Laravel Nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vyuldashev/nova-column-filter.svg?style=flat-square)](https://packagist.org/packages/vyuldashev/nova-column-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/vyuldashev/nova-column-filter.svg?style=flat-square)](https://packagist.org/packages/vyuldashev/nova-column-filter)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require vyuldashev/nova-column-filter
```

## Usage

Simple filter using equals constraint:

```php
<?php

declare(strict_types=1);

namespace App\Nova\Filters;

use Vyuldashev\NovaColumnFilter\ColumnFilter;

class EmailFilter extends ColumnFilter
{
    public $name = 'Email';
    public $column = 'email';
}
```

Advanced filter with custom query:

```php
<?php

declare(strict_types=1);

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Laravel\Nova\Filters\DateFilter;

class CreatedAtFromFilter extends DateFilter
{
    public $name = 'Created at from';

    public function apply(Request $request, $query, $value): object
    {
        $value = Carbon::parse($value);

        return $query->where('created_at', '>=', $value->startOfDay());
    }
}
```
