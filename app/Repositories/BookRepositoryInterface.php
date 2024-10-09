<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface BookRepositoryInterface
{
    public function paginate(Request $request): LengthAwarePaginator;
}
