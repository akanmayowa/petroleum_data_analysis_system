<?php

namespace App\Exports\gas;

use App\gas_product_vol_import_permit;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImportPermitIssuedHeader implements WithTitle, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function headings(): array
    {
        $table = collect($this->getTableColumns('gas_product_vol_import_permit'))->filter(function ($value) 
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
    	return 'Gas Import Permit Templates';  
    }



   
    public function getTableColumns($table)
    {
        return DB::getSchemaBuilder()->getColumnListing($table);
    }

}
