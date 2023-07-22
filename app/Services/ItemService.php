<?php
namespace App\Services;

use App\Models\Item;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ItemService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            $data['image'] = $this->upload( $data['image'] ?? null );
            DB::beginTransaction();
                $row = Item::updateOrCreate(['id' => $id], $data);
                $this->syncStores($data['stores'], $row);
            DB::commit();
            return $row;
        } catch(Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    protected function syncStores(?array $stores = [], Item $item)
    {
        $rows = [];
        foreach ($stores as $store) {
            $rows[ $store['store_id'] ] = [
                'quantity' => number_format($store['quantity'], 4),
                'shop_id'  => shopId(),
            ];
        }
        if (count($rows)) $item->stores()->sync($rows);
    }

    protected function upload(?UploadedFile $file = null): ?string
    {
        if (! $file) return null;

        $path = "uploads/".shopId()."/items";
        $name = $file->hashName();
        $file->move($path, $name);
        return $name;
    }
}
