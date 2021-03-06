<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VrObject extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'company' => $this->company,
            'type' => $this->type,
            'obj2dl' => $this->obj2dl,
            'obj3dl' => $this->obj3dl,
            'descr' => $this->descr,
            'sfbLink' => $this->sfbLink,


        ];
    }
}
