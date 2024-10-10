<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class BookData extends Data
{
    public function __construct(
        public int $author_id,
        public string $title,
        public string $description,
        public string $publish_date
    ) {}
}
