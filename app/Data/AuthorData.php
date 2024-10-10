<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class AuthorData extends Data
{
    public function __construct(
        public string $name,
        public string $bio,
        public string $birth_date
    ) {}
}
