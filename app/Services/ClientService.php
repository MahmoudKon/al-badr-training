<?php
namespace App\Services;

use App\Models\Client;
use Exception;

class ClientService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            return Client::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }
}
