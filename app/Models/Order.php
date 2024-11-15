<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = ['duration', 'onDate', 'users_idUser', 'message', 'typeRoom_idTypeRoom', 'status'];
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
}
