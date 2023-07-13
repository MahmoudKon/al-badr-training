<?php

namespace App\Services;

use Exception;
use App\Models\Shop;
use App\Models\User;

class UserService
{

    public function handel(array $data, ?int $id = null, int $shopID = null)
    {
        try {
            return User::updateOrCreate(['id' => $id, 'shop_id' => $shopID], $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
