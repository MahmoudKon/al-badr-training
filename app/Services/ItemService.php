<?php
namespace App\Services;

use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Exception;

class ItemService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
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

    protected function syncStores(? array $stores = [], Item $item){
        $row = [];
        foreach( $stores as $store){
            $row[$store['store_id']] = [
                'quantity'=>$store['quantity'],
                'shop_id'=>shopId(),
            ];
            if(count($row)){
                $item->stores()->sync($row);
            }
        }
    }
}
