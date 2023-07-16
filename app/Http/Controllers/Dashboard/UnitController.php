<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

use App\Http\Requests\UnitRequest;
use App\Models\Unit;
use App\Services\UnitService;
use Exception;

class UnitController extends BaseController
{

    
  

    public function index(Unit $unit){
       return  $this->indexs($unit, 'units');
    }

    public function create()
    {
        return view('dashboard.units.create');
    }

   

    public function store (UnitRequest $request, UnitService $service)
    {
        return  $this->stores( $request,  $service, "تم انشاء الوحده بنجاح") ;
    }


    public function edit(Unit $unit)
    {
        return view('dashboard.units.update', ['row' => $unit]);
    }

  
    public function update(UnitRequest $request, UnitService $service, $unit){

        return  $this->updates( $request,  $service, $unit, "تم تعديل الوحده بنجاح") ;

    }

   

    public function destroy(Unit $unit){
        return $this->destroys($unit,  "تم حذف الوحده بنجاح");
    }
}

