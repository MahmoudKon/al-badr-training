<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Http\Requests\StoreRequest;
use App\Services\StoreService;
use Exception;

class StoreController extends DashboardController
{
    protected string $folder = 'stores';
    protected string $model  = 'App\\Models\\Store';

    public function store(StoreRequest $request, StoreService $service)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => trans('flash.row created', ['model' => $this->getModule(true)])], 200);
    }

    public function update(StoreRequest $request, StoreService $service, $unit)
    {
        $row = $service->handel($request->validated(), $unit);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => trans('flash.row updated', ['model' => $this->getModule(true)])], 200);
    }
}
