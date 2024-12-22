<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SellResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'paid_method' => $this->paid_method,
            'state'=>$this->state,
            'created_at'=>$this->created_at,
            //'products'=>$this->products
        ];
    }
}
