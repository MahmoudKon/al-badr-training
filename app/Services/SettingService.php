<?php
namespace App\Services;

use App\Models\Setting;
use Exception;

class SettingService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            return Setting::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }
}
