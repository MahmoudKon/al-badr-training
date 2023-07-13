<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\Scopes\PerShopScope;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'shop_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make($value),
        );
    }

    public function scopeFilter(Builder $builder): Builder
    {
        return $builder->when(request()->get('search'), function($query, $search) {
            $query->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%");
        });
    }

    protected static function booted(): void
    {
        // static::addGlobalScope(new PerShopScope); // assign the Scope here
    }

    // protected static function boot(): void
    // {
    //     parent::boot();

<<<<<<< HEAD
    //     self::creating(function($model) {
    //         $model->shop_id = auth()->user()->shop_id;
    //     });
    // }
=======
        self::creating(function($model) {
            $model->shop_id = $model->shop_id ?? auth()->user()->shop_id;
        });
    }
>>>>>>> 8df6cc733abfce36d91e27e49bd79d858636a5a7
}
