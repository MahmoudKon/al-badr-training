<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Models\Client;
use App\Models\Item;

class InvoiceController extends DashboardController
{
    protected string $folder = 'invoices';
    protected string $model  = 'App\\Models\\Invoice';
    protected bool $btn_ajax = false;

    public function items()
    {
        return Item::select('id', 'name')->filter()->limit(10)->pluck('name', 'id');
    }

    public function itemDetails()
    {
        dd('asd');
        return Item::with('category', 'unit')->find(request()->get('item_id'));
    }

    protected function append(): array
    {
        return [
            'clients' => Client::select('id', 'name')->pluck('name', 'id'),
        ];
    }
}
