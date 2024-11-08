<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'stir' => $this->stir,
            'dbit' => [
                'id' => $this->dbit->id,
                'name_extend' => $this->dbit->name_extend,
                'code' => $this->dbit->code,
            ],
            'ifut' => [
                'id' => $this->ifut->id,
                'name_extend' => $this->ifut->name_extend,
                'code' => $this->ifut->code,
            ],
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'manager' => $this->manager,
            'region' => [
                'id' => $this->region->id,
                'name' => $this->region->name
            ],
            'thsht' => [
                'id' => $this->thsht->id,
                'name_extend' => $this->thsht->name_extend,
                'code' => $this->thsht->code
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
