<?php

namespace App\Repositories\Eloquent;

use App\Bases\Repositories\BaseRepository;
use App\Models\Author;
use App\Repositories\AuthorRepositoryInterface;
use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class AuthorRepository.
 */
class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    /**
     * Author Repository constructor.
     */
    public function __construct(Author $model)
    {
        parent::__construct($model);
    }

    /**
     * Retrieve a list of books with pagination, filtered by search.
     */
    public function bookRelationPaginate(int $id, ?Closure $callback = null): LengthAwarePaginator
    {
        $author = $this->find($id, ['books']);

        $books = $author->books();

        if ($callback instanceof Closure) {
            $callback($books);
        }

        return $books->paginate(intval(request()->query('per_page')));
    }
}
