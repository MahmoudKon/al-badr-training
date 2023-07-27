<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Item;
use App\Models\Unit;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Controllers\DashboardController;

class ItemController extends DashboardController
{
    protected string $folder = 'items';
    protected string $model = 'App\\Models\\Item';
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    protected function append(): array
    {
        return [
            'categories' => Category::select('id', 'name')->pluck('name', 'id'),
            'units' => Unit::select('id', 'name')->pluck('name', 'id'),
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    // public function show(Item $item)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Item $item)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Item $item)
    // {
    //     //
    // }
}
