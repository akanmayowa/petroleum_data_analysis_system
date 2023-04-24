<?php

namespace App\Exports\hse;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccreditedWasteManagersHeader implements WithTitle, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function headings(): array
    {
        $table = collect($this->getTableColumns('she_accredited_waste_managers'))->filter(function ($value) 
        {
            if (in_array($value, ['id', 'pending_id', 'others', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                return false;
            }
            return $value;
        });       

        return $table->toArray();
    }

    public function title() : string
    {
        return 'Accredited Waste Managers';  
    }


   
    public function getTableColumns($table)
    {
        return DB::getSchemaBuilder()->getColumnListing($table);
    }

}
