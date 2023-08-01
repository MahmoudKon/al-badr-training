<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Http\Requests\ClientRequest;
use App\Services\ClientService;
use Exception;

class ClientController extends DashboardController
{
    protected string $folder = 'clients';
    protected string $model  = 'App\\Models\\Client';

    public function store(ClientRequest $request, ClientService $service)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => trans('flash.row created', ['model' => $this->getModule(true)]), 'target' => 'clients', 'row' => $row], 200);
    }

    public function update(ClientRequest $request, ClientService $service, $category)
    {
        $row = $service->handel($request->validated(), $category);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => trans('flash.row updated', ['model' => $this->getModule(true)])], 200);
    }
}
