<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\RoomFactory;

class Room extends Model
{
    protected $fillable = ['users_idUser', 'typeRoom_idTypeRoom', 'number', 'statusRoom'];
    public function typeCheck()
    {
        $type = TypeRoom::find($this->typeRoom_idTypeRoom);
        return $type;
    }
    protected static function factory()
    {
        return RoomFactory::new();
    }
}
