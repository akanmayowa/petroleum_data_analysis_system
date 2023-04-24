<?php

namespace App\Exports\downstream;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LubeBlendingPlantHeader implements WithTitle, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function headings(): array
    {
        $table = collect($this->getTableColumns('down_licensed_oil_makerters'))->filter(function ($value) 
        {
            if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                return false;
            }
            return $value;
        });       

        return $table->toArray();
    }

    public function title() : string
    {
        return 'Lubricant Blending Plant';  
    }


   
    public function getTableColumns($table)
    {
        return DB::getSchemaBuilder()->getColumnListing($table);
    }

}
