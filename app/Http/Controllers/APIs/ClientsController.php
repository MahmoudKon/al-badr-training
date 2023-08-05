<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\ClientService ;
use App\Http\Controllers\BaseAPIController;
class ClientsController extends BaseAPIController
{
    public function index()
    {
        $rows = Client::all();
        return $this->sendResponse(ClientResource::collection($rows),
        'all clients retrive succcesfully');
    }

    public function store(ClientRequest $request, ClientService $service)
    {
       
        $row =$service->handel($request->validated());

        return $row instanceof Exception
                ? $this->sendError('please validate error',$validator->errors() )
                : $this->sendResponse(new ClientResource($row), 'client added successfully');
   
        
    }

    public function updates( ClientRequest $request, ClientService $service, $client)
    {
        $row = $service->handel($request->validated(), $client);

        return $row instanceof Exception
        ? $this->sendError('please validate error',$validator->errors() )
        : $this->sendResponse(new ClientResource($row), 'client updated successfully');


    
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return $this->sendResponse(new ClientResource($client), 'client deleted successfully');
    }

}



