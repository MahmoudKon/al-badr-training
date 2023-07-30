<?php

namespace App\Http\Resources;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
{
    public function __construct()
    {
        parent::__construct(Category::class, CategoriesResource::class);
    }

    public function store(CategoryRequest $request)
    {
        $row = $this->model::create($request->validated());
        return $row
                ? $this->sendResponse(trans('flash.row created', ['model' => trans('menu.category')]), ['data' => new $this->resource($row)])
                : $this->sendError('Error try again');
    }

    public function update(CategoryRequest $request, $id)
    {
        $row = $this->model::find($id);
        if (!$row) return $this->sendError('This Category not exists');
        $row->update($request->validated());
        return $this->sendResponse(trans('flash.row update', ['model' => trans('menu.category')]), ['data' => new $this->resource($row)]);
    }

    public function query(?int $id = null): \Illuminate\Database\Eloquent\Builder
    {
        return $this->model::query()->select('id', 'name')->when($id, fn($q) => $q->where('id', $id));
    }
}
