<?php

namespace App\Repositories\Eloquent;

use App\Models\Author;
use App\Repositories\AuthorRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class AuthorRepository.
 */
class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Author $model
     */
    public function __construct(Author $model)
    {
        parent::__construct($model);
    }
}
