<?php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class PostsFilter extends AbstractFilter
{
    protected $filters = [
        'date' => DateFilter::class
    ];
}
