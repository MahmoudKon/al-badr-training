<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function handel(array $data, ?int $id = null): User
    {
        try {
            $user = User::updateOrCreate(['id' => $id], $data);

            if ($id) session()->flash('success', 'user Updated');
            else session()->flash('success', 'user Created');

            return $user;
        } catch(\Exception $e) {
            return $e;
        }
    }
}

