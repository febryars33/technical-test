<?php

namespace App\Bases\Repositories;

use Illuminate\Database\Eloquent\Builder;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository as Repository;

class BaseRepository extends Repository
{
    /**
     * Get a new query builder instance for the model.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->model->query();
    }

    public function delete(int $id)
    {
        return $this->model::query()->findOrFail($id)->delete();
    }
}
