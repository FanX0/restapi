<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSingleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'slug'=> $this->slug,
            'description'=>$this->description,
            'price'=>number_format($this->price,0,'.','.'),
            'actual_price'=>$this->price,
            'created'=>$this->created_at->format("d F, Y"),
            'picture' => $this->picture,
            'category'=>$this->category,
        ];
    }
}
