<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->product->title,
            'price' => $this->product->price,
            'user' => $this->user_id,
            'image' => $this->product->image,
            'painting_id' => $this->product->id,
        ];
    }
}