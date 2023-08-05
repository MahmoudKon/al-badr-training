<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Services\ItemService ;
use App\Http\Controllers\BaseAPIController;
class ItemController extends BaseAPIController
{
    public function index()
    {
        $itemes = Item::all();
        return $this->sendResponse(ItemResource::collection($itemes),
        'all items retrive succcesfully');
    }

    public function store(ItemRequest $request, ItemService $service)
    {
       
        $row =$service->handel($request->validated());

        return $row instanceof Exception
                ? $this->sendError('please validate error',$validator->errors() )
                : $this->sendResponse(new ItemResource($row), 'item added successfully');
   
        
    }

    public function updates( ItemRequest $request, ItemService $service, $item)
    {
        $row = $service->handel($request->validated(), $item);

        return $row instanceof Exception
        ? $this->sendError('please validate error',$validator->errors() )
        : $this->sendResponse(new ItemResource($row), 'item updated successfully');


    
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return $this->sendResponse(new ItemResource($item), 'item deleted successfully');
    }

}





