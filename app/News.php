<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = [
        'title','content'
    ];
    public static function addNews($data)
    {
        $news = new News();
        return $news->create($data);
    }

}
