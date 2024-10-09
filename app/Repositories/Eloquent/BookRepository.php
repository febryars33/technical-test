<?php

namespace App\Repositories\Eloquent;

use App\Bases\Repositories\BaseRepository;
use App\Models\Book;
use App\Repositories\BookRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

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

    public function paginate(Request $request): LengthAwarePaginator
    {
        $query = $this->query();

        if ($request->query('search')) {
            $query->where('title', 'like', '%' . $request->query('search') . '%');
        }

        return $query->paginate();
    }
}
