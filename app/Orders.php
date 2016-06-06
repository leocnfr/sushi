<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    //
    protected $table='orders';
    protected $fillable=['user_id','content','price','address','zip_code'];

    public function showUser($userId)
    {

        return DB::table('users')->where('id',$userId)->first()->nom;
    }

    public function countOrder()
    {
        return count(Orders::all());
    }

}
