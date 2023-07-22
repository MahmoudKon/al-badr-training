<?php
namespace App\Services;

use App\Models\clients;
use Exception;

class ClientService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            return clients::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }
}
