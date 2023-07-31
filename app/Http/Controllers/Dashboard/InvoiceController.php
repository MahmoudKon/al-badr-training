<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Invoice;
use App\Models\InvoiceSetting;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;

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

        /**
     * Store a newly created resource in storage.
     */
    public function setting_store(Request $request)
    {
        $setting = InvoiceSetting::where('id',1)->update($request->except('_token'));
        if($setting){
            return redirect()->route('dashboard.invoices.setting');
        }else{dd($request);}

    }

    public function setting()
    {
        $settings = InvoiceSetting::get();
        $rows = json_decode(json_encode ( $settings ) , true);

        $result =[];
        foreach($rows as $row){
            // $last_iteration = null;
            foreach($row as $key=> $value){

                if(strpos($key, "-")){

                    $indexes = explode("-",$key);
                    $result[$indexes[0]][$key] = $value;

                    // if($indexes[0]!=$last_iteration){
                    //     $result[$indexes[0]] = [$key=>$value];

                    // }else{
                    //     $result[$indexes[0]][$key] = $value;
                    // }

                    // $last_iteration = $indexes[0];
                }
            }

        }


        return view('dashboard.invoice.setting_bell', compact('result'));
    }
    public function print()
    {
        $settings = InvoiceSetting::get();
        // $settings_up = [];
        foreach($settings as $setting){
            // str_replace return json_encode as string so if You need to work on result of it you must decode result
            $result_encode = str_replace('-','_', $setting);//dd($setting,$result);
            // $settings_up[] = $result;
        }
        $result = json_decode($result_encode);
        // dd($settings, $result);
        return view('dashboard.invoice.print', compact('result'));
    }


}
