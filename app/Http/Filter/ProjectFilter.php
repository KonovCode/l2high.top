<?php

namespace App\Http\Filter;

use App\Http\Filter\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ProjectFilter extends AbstractFilter
{
 
    public const RATES = 'rates';

    public const CHRONICLES = 'chronicles';

    protected function getCallbacks(): array
    {
        return [
            self::RATES => [$this, 'rates'],
            self::CHRONICLES => [$this, 'chronicles'],
        ];
    }

    public function rates(Builder $builder, $value) 
    {
        $builder->where('rates', $value);
    }

    public function chronicles(Builder $builder, $value) 
    {
        $builder->where('chronicles', $value);
    }
}