<?php

namespace App\Http\Filter;

use Illuminate\Database\Eloquent\Builder;

interface InterfaceFilter 
{
    public function apply(Builder $builder);
}