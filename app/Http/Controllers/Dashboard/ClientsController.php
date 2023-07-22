<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Models\clients;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Services\ClientService;
use Exception;

class ClientsController extends DashboardController
{
    protected string $folder = 'clients';
    protected string $model  = 'App\\Models\\clients';

    public function store(ClientRequest $request, ClientService $service)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم انشاء عميل بنجاح'], 200);
    }

    public function update(ClientRequest $request, ClientService $service, $client)
    {
        $row = $service->handel($request->validated(), $client);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم تعديل العميل بنجاح'], 200);
    }

   
    
}

