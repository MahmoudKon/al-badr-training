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
use App\Traits\FilterPerShop;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use Auth;

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
        'shop_id',
        'role_id',
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

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id')->select('id', 'name');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    /**
     * hasAbility function using For determine
     * if that user has access on that route or not
     * permissions parameter recieve from AuthServiceProvider
     */
    public function hasAbility($permissions){
        // $role = Auth::user()->role();
        $role = $this->role(); // getting role through relation function
        if($role){dd($role);
            foreach($role->permission as $per){
                if(isset($permissions) && in_array($per, $permissions)){
                    return true;
                }elseif(is_string($permissions) && strcmp($permissions, $per) == 0){
                    return true;
                }
            }
        }else{
            return false;
        }
    }
}
