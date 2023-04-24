<?php

namespace App\Exports\hse;

use App\she_pet_category;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class SheChemCategorySheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return she_pet_category::select('id', 'category_name');
    }

    public function title(): string
    {
        return 'Categories';
    }
}
