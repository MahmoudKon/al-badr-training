<?php
namespace App\Services;

use App\Models\categories;
use Exception;

class categoriesService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            return categories::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }
}
