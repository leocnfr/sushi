<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
        'name', 'price','content','productImage','count','send_time','is_show'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','cat_id');
    }

    public static function showAll()
    {
        return Product::all();
    }

    public function showBoisson()
    {
        return Product::where('cat_id','6')->get();
    }

    public function showBoisson2()
    {
        return Product::where('cat_id','6')->where('is_show','!=',0)->get();

    }
}
