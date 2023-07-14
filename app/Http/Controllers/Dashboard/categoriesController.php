<?php
namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Http\Requests\categoriesRequest;
use App\Models\categories;
use App\Services\categoriesService;
use Exception;


use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $rows =categories::filter();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view('dashboard.categories.includes.rows', ['rows' => $rows->paginate( request()->get('limit', 1) )])->render(),
            ]);
        }
        return view('dashboard.categories.index');
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(categoriesRequest $request, categoriesService $service)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم انشاء اليوزر بنجاح'], 200);
    }

    public function edit(categories $categories)
    {
        return view('dashboard.categories.update', ['row' => $categories]);
    }

    public function update(categoriesRequest $request, categoriesService $service, $unit)
    {
        $row = $service->handel($request->validated(), $unit);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم تعديل الوحده بنجاح'], 200);
    }

    public function destroy(categories $categories)
    {
        $categories->delete();
        return response()->json(['message' => 'تم حذف الوحده بنجاح'], 200);
    }
}