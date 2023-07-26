<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\ItemRequest;
use App\Services\ItemService;
use App\Models\Item;
use App\Models\Store;
use App\Models\Unit;
use Exception;
use Illuminate\Database\Eloquent\Builder;
class ItemController extends BaseController
{
    protected string $folder = 'items';
    protected string $model  = 'App\\Models\\Item';
    protected string $message = 'المنتج';



    
    public function store (ItemRequest $request, ItemService $service)
    {
       // dd('kdddddd');
        return  $this->stores( $request,  $service, $this->message);

    }
    
    public function edit(Item $item)
    {
        return view('dashboard.items.update', ['row' => $item]);
    }


    public function update(ItemRequest $request, ItemService $service, $item){
        //dd($store);
        return  $this->updates( $request,  $service, $store,$this->message) ;

    }

    
    public function destroy(Item $item){
        return $this->destroys($store,  "تم حذف المستودع بنجاح");
    }



    
    protected function append(): array
    {
        return [
            'categories' => Category::select('id', 'name')->pluck('name', 'id'),
            'units'      => Unit::select('id', 'name')->pluck('name', 'id'),
            'stores'     => Store::select('id', 'name')->pluck('name', 'id')
        ];
    }

    protected function query(?int $id = null): Builder
    {
        return $this->model::filter()->with('unit', 'category')->when($id, fn($query) => $query->where('id', $id));
    }
}
