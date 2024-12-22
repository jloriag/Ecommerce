<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EcommerceDataResource extends JsonResource
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
            'webpage_banner'=>$this->webpage_banner,
            'email'=>$this->email,
            'instagram'=>$this->instagram,
            'facebook'=>$this->facebook,
            'whatsapp'=>$this->whatsapp,
            'webpage_icon'=>$this->webpage_icon,
            'created_at'=>$this->created_at,
        ];
    }
}
