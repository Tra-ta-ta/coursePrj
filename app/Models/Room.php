<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\RoomFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
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
