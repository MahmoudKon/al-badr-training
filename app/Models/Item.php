<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['shop_id', 'category_id', 'unit_id', 'name', 'barcode', 'desc', 'image', 'min', 'sale_price', 'pay_price', 'is_active'];

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'item_store', 'item_id', 'store_id')->withPivot('quantity');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class)->select('id', 'name');
    }

    protected function salePrice(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => number_format($value, 4),
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value && file_exists("uploads/{$this->shop_id}/items/$value") ? asset("uploads/{$this->shop_id}/items/$value") : null,
        );
    }

    protected function payPrice(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => number_format($value, 4),
        );
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
