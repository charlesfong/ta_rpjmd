<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    protected $fillable = [
        'name', 'slug', 'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }

    public function hasAccess(array $permissions) : bool
    {
        foreach ($permissions as $permission)
        {
            if ($this->hasPermission($permission))
                return true;
        }
        return false;
    }

    protected function hasPermission(string $permission) : bool
    {
        // return $this->permissions[$permission] ?? false;
        $permissions = json_decode($this->permissions, true);
        return $permissions[$permission]??false;
    }
}
