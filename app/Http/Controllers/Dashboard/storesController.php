<?php

namespace App\Http\Controllers\Dashboard;


use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\storesRequest;
use App\Services\storesService;
use Exception;


class storesController extends DashboardController
{
    protected string $folder = 'stores';
    protected string $model  = 'App\\Models\\stores';

    public function store(storesRequest $request, storesService $service)
    {
    $row = $service->handel($request->validated());

    return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء المخزن بنجاح'], 200);
}

public function update(storesRequest $request, storesService $service, $store)
{
    $row = $service->handel($request->validated(), $store);

    return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل المخزن بنجاح'], 200);
}
}