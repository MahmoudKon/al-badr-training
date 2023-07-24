<?php
namespace App\Services;

use App\Models\Store;
use Exception;

class StoreService
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
