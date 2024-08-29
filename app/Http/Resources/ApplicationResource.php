<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number_in' => $this->number_in,
            'number_out' => $this->number_out,
            'date_in' => $this->date_in,
            'date_out' => $this->date_out,
            'file' => $this->file
        ];
    }
}
