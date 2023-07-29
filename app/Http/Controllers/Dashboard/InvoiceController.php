<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Unit;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Services\InvoiceService;
use App\Http\Controllers\Controller;
use App\Http\Requests\InoviceRequest;
use App\Http\Controllers\DashboardController;

class InvoiceController extends DashboardController
{
    protected string $view = 'invoices';
    protected string $model = 'App\\Models\\Invoice';
    protected bool $btn_ajax = false;

    public function store(InoviceRequest $request, InvoiceService $service)
    {
        // dd();
        return $request->all();
        $row = $service->handel($request->validated());
        // $row->stores()->attach([$request->store_id => ['shop_id' => auth()->user()->shop_id, 'quantity' => $request->quantity]]);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء الفاتورة بنجاح'], 200);
    }

    public function update(InoviceRequest $request, InvoiceService $service, $store)
    {
        $row = $service->handel($request->validated(), $store);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل الفاتورة بنجاح'], 200);
    }

    protected function append(): array
    {
        return [
            'clients' => Client::select('id', 'name')->pluck('name', 'id'),
            'units' => Unit::select('id', 'name')->pluck('name', 'id'),
        ];
    }
}
