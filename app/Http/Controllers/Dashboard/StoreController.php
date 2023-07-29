<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Models\Store;
use App\Models\Shop;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Services\StoreService;

class StoreController extends DashboardController
{

    protected string $folder = 'stores';
    protected string $model = 'App\\Models\\Store';
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request, StoreService $service)
    {
        $row = $service->handel($request->validated());
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء تصنيف بنجاح'], 200);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStoreRequest $request, StoreService $service, $store)
    {
        $row = $service->handel($request->validated(), $store);
        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم تعديل التصنيف بنجاح'], 200);
    }

    protected function append():array{
        return[
            'shops' => Shop::select('id', 'name')->pluck('name', 'id'),
        ];
    }

}
