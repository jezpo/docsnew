<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoleAndPermission;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'imagen',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Verifica si el usuario tiene el rol especificado.
     *
     * @param string|array $role
     * @param bool $all (opcional)
     * @return bool
     */
    public function hasRole($role, $all = false)
    {
        return parent::hasRole($role, $all);
    }

    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->pluck('action')->unique();
    }
}