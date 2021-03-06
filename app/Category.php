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

    //导航栏显示
    public function getMenu()
    {
        return Category::where('order','>','0')->orderBy('order')->get();
    }
    //sidebar
    public function getSideMenu($cateId)
    {
        return Category::where('id',$cateId)->first();
    }
    public function getOther($cateId)
    {
        return Category::where('id','!=',$cateId)->where('order','>','0')->get();

    }
}
