<?php
namespace App\Services;

use App\Models\Item;
use App\Models\ItemStore;
use App\Models\ItemTransaction;
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
        foreach ($stores as $store) {
            $item_store = ItemStore::where('item_id', $item->id)->where('store_id', $store['store_id'])->first();
            if ($item_store) {
                if ($item_store->quantity != $store['quantity']) {
                    $qty = $store['quantity'] - $item_store->quantity;
                    $this->transaction($item, $store['store_id'], $qty, $item_store->quantity);
                    $item_store->increment('quantity', $qty);
                }
            } else {
                $item_store = ItemStore::create([
                    'item_id' => $item->id,
                    'store_id' => $store['store_id'],
                    'quantity' => number_format($store['quantity'], 4),
                    'shop_id'  => shopId(),
                ]);
                $this->transaction($item, $store['store_id'], $store['quantity']);
            }
        }
    }

    protected function upload(?UploadedFile $file = null): ?string
    {
        if (! $file) return null;

        $path = "uploads/".shopId()."/items";
        $name = $file->hashName();
        $file->move($path, $name);
        return $name;
    }

    protected function transaction(Item $item, int $store_id, float $qty, float $old_qty = 0)
    {
        ItemTransaction::create([
            'item_id' => $item->id,
            'store_id' => $store_id,
            'qty' => $qty,
            'old_qty' => $old_qty,
            'price' => $item->sale_price
        ]);
    }
}
