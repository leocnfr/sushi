<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relais extends Model
{
    //
    protected $fillable = [
        'name', 'address', 'intro'
    ];
}
