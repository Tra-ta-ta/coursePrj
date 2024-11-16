<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders_on_service extends Model
{
    use SoftDeletes;
    protected $fillable = ['rooms_idRoom', 'users_idUser', 'services_idService', 'status'];
    public function checkRoom()
    {
        $room = Room::find($this->rooms_idRoom);
        return $room;
    }
    public function checkUser()
    {
        $user = User::find($this->users_idUser);
        return $user;
    }
    public function checkService()
    {
        $service = Service::find($this->services_idService);
        return $service;
    }
}
