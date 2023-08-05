<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use App\Models\Unit;
use App\Services\UnitService ;
use App\Http\Controllers\BaseAPIController;
class UnitController extends BaseAPIController
{
    public function index()
    {
        $rows = Unit::all();
        return $this->sendResponse(UnitResource::collection($rows),
        'all units retrive succcesfully');
    }

    public function store(UnitRequest $request, UnitService $service)
    {
       
        $row =$service->handel($request->validated());

        return $row instanceof Exception
                ? $this->sendError('please validate error',$validator->errors() )
                : $this->sendResponse(new UnitResource($row), 'unit added successfully');
   
        
    }

    public function updates( UnitRequest $request, UnitService $service, $unit)
    {
        $row = $service->handel($request->validated(), $unit);

        return $row instanceof Exception
        ? $this->sendError('please validate error',$validator->errors() )
        : $this->sendResponse(new UnitResource($row), 'unit updated successfully');


    
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return $this->sendResponse(new UnitResource($unit), 'Unit deleted successfully');
    }

}



















