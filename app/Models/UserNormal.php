<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;

class UserNormal extends User
{
    protected $table = 'users';

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id')->select('id', 'name');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new PerShopScope); // assign the Scope here
    }

    protected static function boot(): void
    {
        parent::boot();

        self::creating(function($model) {
            $model->shop_id = shopId($model->shop_id);
        });
    }
}
