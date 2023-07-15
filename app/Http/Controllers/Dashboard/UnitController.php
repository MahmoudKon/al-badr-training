<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\UnitService;
use App\Http\Requests\UnitRequest;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $rows = Unit::filter();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view('dashboard.units.includes.rows', ['rows' => $rows->paginate(request()->get('limit', 1))])->render(),
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
            : response()->json(['message' => 'تم انشاء اليوزر بنجاح'], 200);
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
            : response()->json(['message' => 'تم تعديل اليوزر بنجاح'], 200);
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('dashboard.units.index');
    }
}
