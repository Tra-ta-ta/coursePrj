<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['Duration', 'onDate', 'Users_idUser','Message', 'TypeRoom_idTypeRoom'];
}
