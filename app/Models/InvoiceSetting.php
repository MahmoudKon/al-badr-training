<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "invoice_settings";
    protected $fillable = [ 'client-name', 'client-address', 'client-email', 'client-phone',
                            'shop-name', 'shop-address', 'shop-email', 'invoice-id', 'invoice-qr', 'invoice-date'];

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
