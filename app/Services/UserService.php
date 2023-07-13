<?php
namespace App\Services;

use App\Models\UserNormal;
use Exception;

class UserService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            return UserNormal::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }
}
