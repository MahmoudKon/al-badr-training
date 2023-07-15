<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Exception;

class CategoryController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $rows = Category::filter();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view('dashboard.categories.includes.rows', ['rows' => $rows->paginate(request()->get('limit', 1))])->render(),
            ]);
        }
        return view('dashboard.categories.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.categories.create', compact('categories'));
    }

    public function store(CategoryRequest $request, CategoryService $service)
    {
        $row = $service->handel($request->validated());
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء الصنف بنجاح'], 200);
    }

    public function edit(Category $category)
    {
        $categories = Category::mainCategory($category->id);
        return view('dashboard.categories.update', ['row' => $category, 'categories' => $categories]);
    }
    public function update(CategoryRequest $request, CategoryService $service, $category)
    {
        $row = $service->handel($request->validated(), $category);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل الصنف بنجاح'], 200);
    }

    public function destroy(Category $category)
    {
        if ($category->child->count() > 0) {
            return response()->json(['message' => 'هذا الصنف لديه أبناء'], 500);
        }
        $category->delete();
        return redirect()->route('dashboard.categories.index');
    }
}
