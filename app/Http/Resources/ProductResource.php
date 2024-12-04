<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description'=>$this->description,
            'price'=>$this->price,
            'state_id'=>$this->state_id,
            'brand'=>$this->brand,
            'amount'=>$this->amount,
            'sku'=>$this->sku,
            'created_at'=>$this->created_at,
            'images'=>$this->images
        ];
    }
}