<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Shop;
use App\Http\Requests\ShopRequest;
use App\Services\ShopService ;
class ShopController extends BaseController
{
    public function edit(Shop $shop)
    {
        return view('dashboard.shops.update', ['row' => $shop]);
    }

    public function update(ShopRequest $request, ShopService $service, $shop){

        return  $this->updates( $request,  $service, $shop, "تم تعديل الموسسه بنجاح") ;

    }
}
