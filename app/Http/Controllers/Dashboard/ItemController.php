<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Item;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Store;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Controllers\DashboardController;
use App\Services\ItemService;

class ItemController extends DashboardController
{
    protected string $folder = 'items';
    protected string $model = 'App\\Models\\Item';


    protected function append(): array
    {
        return [
            'categories' => Category::select('id', 'name')->pluck('name', 'id'),
            'units' => Unit::select('id', 'name')->pluck('name', 'id'),
            'stores' => Store::select('id', 'name')->pluck('name', 'id'),
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request, ItemService $service)
    {
        $row = $service->handel($request->validated());
        return $row instanceof Exception
                ? response()->json($row, 500)
                :response()->json(['message' => 'تم انشاء منتج بنجاح'], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

}
