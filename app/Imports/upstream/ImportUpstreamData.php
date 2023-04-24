<?php

namespace App\Imports\upstream;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class ImportUpstreamData implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $data;
    private $view;
    
    public function __construct($data, $view)
    {
        $this->data = $data;
        $this->view = $view;
    }


    public function view(): View
    {
        return view($this->view, 
        [
            'data' => $this->data
        ]);
    }

}
