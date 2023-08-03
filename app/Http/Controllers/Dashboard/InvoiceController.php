<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Store;

class InvoiceController extends DashboardController
{
    protected string $folder = 'invoices';
    protected string $model  = 'App\\Models\\Invoice';
    protected bool $btn_ajax = false;

    public function items()
    {
        return Item::select('id', 'name')->filter()
                ->whereHas('stores', function($query) {
                    $query->where('store_id', request()->store_id);
                })->limit(10)->pluck('name', 'id');
    }

    public function itemDetails()
    {
        $row = Item::with([
                            'category', 'unit',
                            'stores' => function($query) {
                                $query->where('store_id', request()->store_id)->where('quantity', '>', '0');
                            }
                        ])
                        ->whereHas('stores', function($query) {
                            $query->where('store_id', request()->store_id)->where('quantity', '>', '0');
                        })->find(request()->get('item_id'));
        if ($row ) {
            return $row;
        }
        return response()->json(['message' => 'No Items In This Store...'], 500);
    }

    protected function append(): array
    {
        return [
            'clients' => Client::select('id', 'name')->pluck('name', 'id'),
            'stores'  => Store::select('id', 'name')->pluck('name', 'id'),
            'bill_no' => Invoice::getMaxNumber(),
        ];
    }
}
