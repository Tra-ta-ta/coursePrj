<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function typeCheck()
    {
        $type = TypeRoom::find($this->typeRoom_idTypeRoom);
        return $type;
    }
}
