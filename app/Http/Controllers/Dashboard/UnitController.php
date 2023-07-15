<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Models\Unit;
use App\Services\UnitService;
use Exception;

class UnitController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $rows = Unit::filter();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view('dashboard.units.includes.rows', ['rows' => $rows->paginate( request()->get('limit', 1) )])->render(),
            ]);
        }
        return view('dashboard.units.index');
    }

    public function create()
    {
        return view('dashboard.units.create');
    }

    public function store(UnitRequest $request, UnitService $service)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم انشاء الوحده بنجاح'], 200);
    }

    public function edit(Unit $unit)
    {
        return view('dashboard.units.update', ['row' => $unit]);
    }

    public function update(UnitRequest $request, UnitService $service, $unit)
    {
        $row = $service->handel($request->validated(), $unit);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم تعديل الوحده بنجاح'], 200);
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return response()->json(['message' => 'تم حذف الوحده بنجاح'], 200);
    }
}

