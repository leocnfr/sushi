<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relais extends Model
{
    //
    protected $table = 'relais';

    protected $fillable = [
        'name', 'address', 'intro','send_time'
    ];
    protected $guarded=['id'];
    //添加Relais
    public  function addRelais($data)
    {
        return $this->create($data);
    }

    //更新

    public static function updateRelais($id,array $data)
    {
        $relais=static::findOrFail($id);
        return $relais->update($data);
    }
    //显示全部
    public static function showAll()
    {
        return Relais::all();
    }
    //删除
    public static function delRelais($id)
    {
        return Relais::destroy($id);
    }

}
