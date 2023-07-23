<?php
namespace App\Services;

use App\Models\Store;
use Exception;

class StoresService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            return Store::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }
}
