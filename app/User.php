<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'category_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_categories()
    {
        return $this->belongsToMany(UserCategory::class, 'role_users');
    }

    /**
     * Checks if User has access to $permissions.
     */
    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        // $tes = json_decode($this->permissions, true);
        // dd($tes["add-member"]);
        
        foreach ($this->user_categories as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    protected function hasPermission(string $permission) : bool
    {
        // return $this->permissions[$permission] ?? false;
        $permissions = json_decode($this->permissions, true);
        return $permissions[$permission]??false;
    }

    /**
     * Checks if the user belongs to role.
     */
    public function inRole(string $roleSlug)
    {
        return $this->user_categories()->where('slug', $roleSlug)->count() == 1;
    }

    public function visi()
    {
        return $this->hasOne('App\Visi');
    }
}
