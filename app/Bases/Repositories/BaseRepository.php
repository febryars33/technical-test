<?php

namespace App\Bases\Repositories;

use App\Bases\Repositories\Interface\BaseRepositoryInterface;
use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use LogicException;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository as Repository;

class BaseRepository extends Repository implements BaseRepositoryInterface
{
    /**
     * Get a new query builder instance for the model.
     */
    public function query(): Builder
    {
        return $this->model->query();
    }

    /**
     * Delete the specified resource from storage.
     *
     *
     * @throws LogicException
     */
    public function delete(int $id): ?bool
    {
        return $this->model::query()->findOrFail($id)->delete();
    }

    /**
     * Retrieve a list of books with pagination.
     */
    public function paginate(?Closure $callback = null): LengthAwarePaginator
    {
        $query = $this->query();

        if ($callback instanceof Closure) {
            $callback($query);
        }

        return $query->paginate(intval(request()->query('per_page')));
    }
}
