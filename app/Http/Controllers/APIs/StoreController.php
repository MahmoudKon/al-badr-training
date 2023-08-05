<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use App\Services\StoreService ;
use App\Http\Controllers\BaseAPIController;
class StoreController extends BaseAPIController
{
    public function index()
    {
        $rows = Store::all();
        return $this->sendResponse(StoreResource::collection($rows),
        'all stores retrive succcesfully');
    }

    public function store(StoreRequest $request, StoreService $service)
    {
       
        $row =$service->handel($request->validated());

        return $row instanceof Exception
                ? $this->sendError('please validate error',$validator->errors() )
                : $this->sendResponse(new StoreResource($row), 'store added successfully');
   
        
    }

    public function updates( StoreRequest $request, StoreService $service, $store)
    {
        $row = $service->handel($request->validated(), $store);

        return $row instanceof Exception
        ? $this->sendError('please validate error',$validator->errors() )
        : $this->sendResponse(new StoreResource($row), 'store updated successfully');


    
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return $this->sendResponse(new StoreResource($store), 'store deleted successfully');
    }

}



















