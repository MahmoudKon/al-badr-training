<?php

namespace App\Http\Controllers\Dashboard\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UnitRequest;
use App\Http\Resources\UnitsResource;
use App\Models\Unit;

class UnitController extends ApiController
{
    public function __construct()
    {
        parent::__construct(Unit::class, UnitsResource::class);
    }

    public function store(UnitRequest $request)
    {
        $row = $this->model::create($request->validated());
        return $row
                ? $this->sendResponse(trans('flash.row created', ['model' => trans('menu.unit')]), ['data' => new $this->resource($row)])
                : $this->sendError('Error try again');
    }

    public function update(UnitRequest $request, $id)
    {
        $row = $this->model::find($id);
        if (!$row) return $this->sendError('This unit not exists');
        $row->update($request->validated());
        return $this->sendResponse(trans('flash.row update', ['model' => trans('menu.unit')]), ['data' => new $this->resource($row)]);
    }

    public function query(?int $id = null): \Illuminate\Database\Eloquent\Builder
    {
        return $this->model::query()->select('id', 'name')->when($id, fn($q) => $q->where('id', $id));
    }
}
