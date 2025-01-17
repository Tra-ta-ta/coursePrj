<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $fillable = ['name', 'thirdname', 'surname', 'phone', 'login', 'password'];

    public function isAdmin()
    {
        $role = Role::find($this->roles_idRole);
        return $role->value == 'Администратор' ? true : false;
    }
    public function isUser()
    {
        $role = Role::find($this->roles_idRole);
        return $role->value == 'Пользователь' ? true : false;
    }
    public function isPersonal()
    {
        $role = Role::find($this->roles_idRole);
        return $role->value == 'Персонал' ? true : false;
    }
    public function currentRoom()
    {
        $room = Room::where('users_idUser', '=', $this->id)->first();
        return $room;
    }
}
