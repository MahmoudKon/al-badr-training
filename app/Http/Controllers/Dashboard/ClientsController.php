<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\ClientRequest;
use App\Services\ClientService;
class ClientsController extends BaseController
{
    protected string $folder = 'clients';
    protected string $model  = 'App\\Models\\Client';
    protected string $message = 'الزبون';
    // public array arr = new ClientRequest();
    // protected object $request = App\Http\Requests\ClientRequest ;
    // protected string $service = 'App\Services\ClientService';


    public function store (ClientRequest $request, ClientService $service)
    {
        return  $this->stores( $request,  $service, "تم انشاء الوحده بنجاح") ;

    }

    public function update(ClientRequest $request, ClientService $service, $client){

        return  $this->updates( $request,  $service, $client, "تم تعديل الزبوت بنجاح"  ) ;

    }

}
