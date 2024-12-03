<?php

namespace App\Http\Controllers;

use App\Data\AuthorData;
use App\Http\Requests\Author\StoreRequest;
use App\Http\Resources\Author as ResourcesAuthor;
use App\Http\Resources\Book as ResourcesBook;
use App\Models\Author;
use App\Models\Book;
use App\Repositories\AuthorRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(
        protected AuthorRepositoryInterface $repository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $paginate = $this->repository->paginate(function (Builder $query) use ($request) {
            if ($request->query('search')) {
                $query->where('name', 'like', '%'.$request->query('search').'%');
            }
        });

        $paginate->getCollection()->transform(function (Author $book) {
            return new ResourcesAuthor($book);
        });

        return $this->response($paginate);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return $this->response(new ResourcesAuthor($this->repository->create(AuthorData::from($request)->all())), __('Data has been created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return $this->response(new ResourcesAuthor($this->repository->find((int) $id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $update = $this->repository->update((int) $id, AuthorData::from($request)->all());

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

    /**
     * Retrieve all books by a specific author.
     */
    public function books(Request $request, string $id): JsonResponse
    {
        $paginate = $this->repository->bookRelationPaginate((int) $id, function ($query) use ($request) {
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
}
