<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    use HasFactory;

    protected $table = 'item_transaction';
    protected $fillable = ['shop_id','item_id','user_id', 'store_id','invoice_id','qty','old_qty','price'];

    public function item()
    {
        return $this->belongsTo(Item::class)->select('id', 'name');
    }

    public function store()
    {
        return $this->belongsTo(Store::class)->select('id', 'name');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name');
    }

    protected function currentQty(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->old_qty + $this->qty,
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
            $model->user_id = auth()->id();
        });
    }
}
