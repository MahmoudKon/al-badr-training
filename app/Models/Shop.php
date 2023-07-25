<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone'];

    public function users()
    {
        return $this->hasMany(User::class, 'shop_id', 'id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class, 'shop_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Unit::class, 'shop_id', 'id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new PerShopScope); // assign the Scope here
    }
}
