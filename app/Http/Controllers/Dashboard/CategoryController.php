<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends DashboardController
{
    protected string $folder = 'categories';
    protected string $model  = 'App\\Models\\Category';

    public function store(CategoryRequest $request, CategoryService $service)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم انشاء تصنيف بنجاح'], 200);
    }

    public function update(CategoryRequest $request, CategoryService $service, $category)
    {
        $row = $service->handel($request->validated(), $category);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم تعديل التصنيف بنجاح'], 200);
    }

    public function toggleStatus(Category $category)
    {
        $category->update(['is_show' => !$category->is_show]);
        return response()->json(['message' => 'تم تعديل حالة التصنيف بنجاح'], 200);
    }

    public function multiDelete(Request $r)
    {
        if(Category::destroy($r->ids)){
            return response()->json(['message' => 'تم ازاله  التصنيفات بنجاح'], 200);
        }
        return response()->json(['message' => 'العمليه غير صحيحه'], 500);
    }

    public function subCategory()
    {
        $categories = Category::select('name','category_id')->whereNull('category_id')->get();

        return view('dashboard.categories.tree', compact('categories'));

    }

    protected function append(): array
    {
        return [
            'categories' => Category::select('id', 'name')->whereNotIn('id', $this->getCats( request()->get('category') ))->pluck('name', 'id')
        ];
    }

    protected function getCats(?int $id = null)
    {
        if (is_null($id)) return [];
        $ids[] = $id;
        $row = Category::with('subs')->where('id', $id)->first();
        $this->getUniqeIds($ids, $row->subs);
        $row = Category::with('subs')->where('id', $id)->first();
        // dd($ids);
        // dd($row);
        return $ids;
    }

    protected function getUniqeIds(array &$ids, $subs)
    {
        foreach ($subs as $sub) {
            $ids[] = $sub->id;
            $this->getUniqeIds($ids, $sub->subs);
        }
    }
}
