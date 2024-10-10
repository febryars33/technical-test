<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Author extends JsonResource
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
            'name'          =>  $this->name,
            'bio'           =>  $this->bio,
            'birth_date'    =>  $this->birth_date->format('d-m-Y'),
            'books'         =>  $this->when($this->relationLoaded('books'), fn() => Book::collection($this->books)),
        ];
    }
}
