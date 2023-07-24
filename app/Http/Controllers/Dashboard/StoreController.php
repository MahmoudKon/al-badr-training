<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreRequest;
use App\Services\StoreService;
use App\Models\Store;
class StoreController extends BaseController
{
    protected string $folder = 'stores';
    protected string $model  = 'App\\Models\\Store';
    protected string $message = 'المستودع';
    

    public function store (StoreRequest $request, StoreService $service)
    {
       // dd('kdddddd');
        return  $this->stores( $request,  $service, $this->message);

    }
    
    public function edit(Store $store)
    {
        return view('dashboard.stores.update', ['row' => $store]);
    }


    public function update(StoreRequest $request, StoreService $service, $store){
        //dd($store);
        return  $this->updates( $request,  $service, $store, "تم تعديل المستودع بنجاح"  ) ;

    }

    
    public function destroy(Store $store){
        return $this->destroys($store,  "تم حذف المستودع بنجاح");
    }

}
