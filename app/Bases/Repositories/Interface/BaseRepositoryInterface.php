<?php

namespace App\Bases\Repositories\Interface;

use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use TimWassenburg\RepositoryGenerator\Repository\EloquentRepositoryInterface;

interface BaseRepositoryInterface extends EloquentRepositoryInterface
{
    /**
     * Get a new query builder instance for the model.
     */
    public function query(): Builder;

    /**
     * Retrieve a list of books with pagination.
     */
    public function paginate(?Closure $callback = null): LengthAwarePaginator;
}
