<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\User;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'permission', 'user_id'];

    ############# one-m Relation
    public function users(){
        return $this->hasMany(User::class, 'role_id');
    }

    public function getPermissionAttribute($permission){
        return json_decode($permission, true);
    }

    // public function scopeFilter(Builder $builder): Builder
    // {
    //     return $builder;
    // }

    // protected static function booted(): void
    // {
    //     static::addGlobalScope(new PerShopScope); // assign the Scope here
    // }

    protected static function boot(): void
    {
        parent::boot();

        self::creating(function($model) {
            $model->shop_id = shopId();
        });
    }
}
