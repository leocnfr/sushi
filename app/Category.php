<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categorys';
    protected $fillable = [
        'cat_name'
    ];

    public function product()
    {
        return $this->hasMany('App\Product','cat_id');
    }

}
