<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Http\Requests\UnitRequest;
use App\Services\UnitService;
use Exception;

class UnitController extends DashboardController
{
    protected string $folder = 'units';
    protected string $model  = 'App\\Models\\Unit';

    public function store(UnitRequest $request, UnitService $service)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم انشاء اليوزر بنجاح'], 200);
    }

    public function update(UnitRequest $request, UnitService $service, $unit)
    {
        $row = $service->handel($request->validated(), $unit);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم تعديل الوحده بنجاح'], 200);
    }
}

