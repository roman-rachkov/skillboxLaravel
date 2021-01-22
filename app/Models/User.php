<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    /**
     * Проверяет обладает ли пользователь опеределенной или набором ролей
     * @param mixed $permission string | array
     * @param bool $require если true, то вернет истину только в случае если у пользователя есть все права передеанные в массиве
     * @return bool
     */
    public function canDo(mixed $permission, $require = false): bool
    {
        if (is_array($permission)) {
            foreach ($permission as $perm) {
                $perm = $this->canDo($perm);
                if ($perm && !$require) {
                    return true;
                } elseif ($require && !$perm) {
                    return false;
                }
            }
            return true;
        } else {
            foreach ($this->roles as $role) {
                foreach ($role->permissions as $perm) {
                    if (strtolower($perm->key) === strtolower($permission)) {
                        return true;
                    }
                }
            }
        }
        return false;
    }


    /**
     * Проверяет обладает ли пользователь определенной ролью
     * @param mixed $roleName string | array
     * @param bool $require если true, то вернет истину только в случае если у пользователя есть все роли передеанные в массиве
     * @return bool
     */
    public function hasRole(mixed $roleName, $require = false): bool
    {
        if (is_array($roleName)) {
            foreach ($roleName as $name) {
                $name = $this->hasRole($name);
                if ($name && !$require) {
                    return true;
                } elseif ($require && !$name) {
                    return false;
                }
            }
            return true;
        } else {
            foreach ($this->roles as $role) {
                if (strtolower($role->key) === strtolower($roleName)) {
                    return true;
                }
            }
        }
        return false;
    }

}
