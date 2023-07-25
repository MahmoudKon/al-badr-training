<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Item;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'is_show', 'shop_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'name', 'category_id');
    }

    public function subs()
    {
        return $this->hasMany(Category::class, 'category_id')->select('id', 'name', 'category_id')->with('subs');
    }

    public function items(){
        return $this->hasMany(Item::class, 'category_id');
    }
    public function scopeFilter(Builder $builder): Builder
    {
        return $builder->when(request()->get('name'), fn($query, $name) => $query->where('name', 'LIKE', "%$name%"));
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
