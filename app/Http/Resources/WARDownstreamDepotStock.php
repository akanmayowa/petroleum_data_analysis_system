<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WARDownstreamDepotStock extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return
        [
            'id' => $this->id,
            'date' => $this->date,
            'week' => $this->week,
            'pms_open_stock' => $this->pms_open_stock,
            'pms_reciept' => $this->pms_reciept,
            'pms_lifting_transfer' => $this->pms_lifting_transfer,
            'pms_closing_stock' => $this->pms_closing_stock,
            'dpk_open_stock' => $this->dpk_open_stock,
            'dpk_reciept' => $this->dpk_reciept,
            'dpk_lifting_transfer' => $this->dpk_lifting_transfer,
            'dpk_closing_stock' => $this->dpk_closing_stock,
            'ago_open_stock' => $this->ago_open_stock,
            'ago_reciept' => $this->ago_reciept,
            'ago_lifting_transfer' => $this->ago_lifting_transfer,
            'ago_closing_stock' => $this->ago_closing_stock,
        ];
    }
}
