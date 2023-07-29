<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Invoice;
use App\Models\InvoiceSetting;
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

    public function setting()
    {
        $settings = InvoiceSetting::get();
        $rows = json_decode(json_encode ( $settings ) , true);

        $result =[];
        foreach($rows as $row){
            $last_iteration = null;
            foreach($row as $key=> $value){
                // dd($key);
                if(strpos($key, "-")){
                    // dd($key);
                    $indexes = explode("-",$key);

                    if($indexes[0]!=$last_iteration){
                        $result[$indexes[0]] = [$key=>$value];
                        // dd($result);
                    }else{
                        $result[$indexes[0]][$key] = $value;
                    }

                    $last_iteration = $indexes[0];
                }
            }
                // dd($last_iteration);
                // dd($result);
        }


        return view('dashboard.invoice.setting_bell', compact('result'));
    }
    public function print()
    {
        return view('dashboard.invoice.print');
    }


}
