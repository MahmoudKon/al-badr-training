<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Item;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'shop_id'];
    ################## one - many relations
    public function shop(){
        return $this->belongsTo(Shop::class, 'shop_id');
    }
    ##################### m-m relations
    public function items(){
        return $this->belongsToMany(Item::class, 'stores_items', 'store_id', 'item_id');
    }

    public function scopeFilter(Builder $builder): Builder
    {
        return $builder;
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new PerShopScope); // assign the Scope here
    }

    protected static function boot(): void
    {
        parent::boot();

        self::creating(function($model) {
            $model->shop_id = shopId();
        });
    }
}
