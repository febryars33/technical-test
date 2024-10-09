<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            =>  $this->id,
            'title'         =>  $this->title,
            'description'   =>  $this->description,
            'author'        =>  $this->when($this->relationLoaded('author'), fn() => new Author($this->author)),
            'publish_date'  =>  $this->publish_date->format('d-m-Y')
        ];
    }
}
