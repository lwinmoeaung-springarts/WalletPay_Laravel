<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->type ==1) {
            $title  = 'From '.($this->source? $this->source->name:'');
        }else if($this->type ==2){
            $title='To '.($this->source? $this->source->name:'');;
        }
        return [
            'trx_id'=>$this->trx_id,
            'amount'=>number_format($this->amount, 2).' MMK',
            'type'=>$this->type, //1 => income , 2 =>expense
            'title'=>$title,
            'date_time'=>Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
