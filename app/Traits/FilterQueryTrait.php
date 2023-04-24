<?php

namespace App\Traits;

trait FilterQueryTrait
{
    public function getQuery($value)
    {
        $value = "%{$value}%";

        $query = $this->newQuery()->where('year', 'like', $value)
        ->orwhereHas('company', function ($query) use ($value) {
            $query->where('company_name', 'like', $value);
        })
        ->orwhereHas('field', function ($query) use ($value) {
            $query->where('field_name', 'like', $value);
        })
        ->orwhereHas('contract', function ($query) use ($value) {
            $query->where('contract_name', 'like', $value);
        })
        ->orwhereHas('terrain', function ($query) use ($value) {
            $query->where('terrain_name', 'like', $value);
        });

        return $query;
    }
}
