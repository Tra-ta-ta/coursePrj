<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = ['duration', 'onDate', 'users_idUser', 'message', 'typeRoom_idTypeRoom', 'status', 'rooms_idRoom'];
    public function checkType()
    {
        $type = TypeRoom::find($this->typeRoom_idTypeRoom);
        return $type;
    }
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
}
