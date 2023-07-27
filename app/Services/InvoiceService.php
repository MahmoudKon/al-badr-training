<?php

namespace App\Services;

use App\Models\Invoice;
use Exception;

class InvoiceService
{

    public function handel(array $data, ?int $id = null)
    {
        // dd($data);
        try {
            return Invoice::updateOrCreate(['id' => $id], $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
