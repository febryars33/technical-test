<?php

namespace App\Repositories\Eloquent;

use App\Bases\Repositories\BaseRepository;
use App\Models\Book;
use App\Repositories\BookRepositoryInterface;

/**
 * Class BookRepository.
 */
class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    /**
     * Book Repository constructor.
     *
     * @param Book $model
     */
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }
}
