<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Controllers\DashboardController;

class InvoiceController extends DashboardController
{
    protected string $folder = 'invoice';
    protected string $model = 'App\\Models\\Invoice';

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

}
