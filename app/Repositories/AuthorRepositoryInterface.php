<?php

namespace App\Repositories;

use App\Bases\Repositories\Interface\BaseRepositoryInterface;
use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AuthorRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Retrieve a list of books with pagination, filtered by search.
     */
    public function bookRelationPaginate(int $id, ?Closure $callback = null): LengthAwarePaginator;
}
