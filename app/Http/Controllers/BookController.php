<?php

namespace App\Http\Controllers;

use App\Data\BookData;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Http\Resources\Book as ResourcesBook;
use App\Models\Book;
use App\Repositories\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(
        protected BookRepositoryInterface $repository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $paginate = $this->repository->paginate(function (Builder $query) use ($request) {
            if ($request->query('search')) {
                $query->where('title', 'like', '%'.$request->query('search').'%');
                $query->orWhere('description', 'like', '%'.$request->query('search').'%');
            }
        });

        $paginate->getCollection()->transform(function (Book $book) {
            return new ResourcesBook($book);
        });

        return $this->response($paginate);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return $this->response(new ResourcesBook($this->repository->create(BookData::from($request)->all())), __('Data has been created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return $this->response(new ResourcesBook($this->repository->find((int) $id, ['author'])));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): JsonResponse
    {
        $update = $this->repository->update((int) $id, BookData::from($request)->all());

        return $this->response($update, __('Data has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $delete = $this->repository->delete($id);

        return $this->response($delete, __('Data has been deleted'));
    }
}
