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
            'title' => $this->painting->title,
            'price' => $this->painting->price,
            'user' => $this->user_id,
            'image' => $this->painting->image,
            'painting_id' => $this->painting->id,
            'artist_name' => $this->painting->artist->name,
            'artist_surname' => $this->painting->artist->surname,
            'artist_patronymic' => $this->painting->artist->patronymic,

        ];
    }
}