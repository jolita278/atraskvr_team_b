<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class VRUsers extends Authenticatable
{
    use Notifiable;
    public $incrementing = false;
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_users';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'first_name', 'last_name', 'user_name', 'email', 'password', 'phone', 'remember_token'];

    /**
     * Fields which will be hidden
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    public function rolesConnectionData()
    {
        return $this->belongsToMany(VRRoles::class, 'vr_users_roles_conn', 'user_id', 'role_id');
    }
}
