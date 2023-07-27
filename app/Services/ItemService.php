<?php
namespace App\Services;

use App\Models\Item;
use Exception;

class ItemService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            return Item::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }
}
