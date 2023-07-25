<?php
namespace App\Services;

use App\Models\Role;
use Exception;

class RoleService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            return Role::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }
}
