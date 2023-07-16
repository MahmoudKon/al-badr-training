<?php
namespace App\Services;

use App\Models\Unit;
use Exception;

class UnitService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            return Unit::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }
}
