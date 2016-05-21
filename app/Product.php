<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
        'name', 'price','content','productImage','count'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','cat_id');
    }

}
