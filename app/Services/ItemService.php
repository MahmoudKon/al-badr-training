<?php

namespace App\Services;

use Exception;
use App\Models\Item;

class ItemService
{

    public function handel(array $data, ?int $id = null)
    {
        try {
            return Item::updateOrCreate(['id' => $id], $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
