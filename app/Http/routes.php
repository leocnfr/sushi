<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin','ProductController@index');
//Route::get('admin', function () {
//    return view('admin.admin_template');
//});
/**
 * PRODUCT 产品路由
 */
Route::get('/admin/products{cateBy?}','ProductController@index');
Route::get('/admin/products/create','ProductController@create');
Route::get('/admin/products/{id}','ProductController@edit');
Route::put('/admin/product/update/','ProductController@update');
Route::post('/admin/product/store','ProductController@store');
Route::delete('/admin/product/delete','ProductController@delete');

/**
 * point relais路由
 */
Route::get('/admin/relais/create','RelaisController@create');
Route::get('/admin/relais/{id}','RelaisController@edit');
Route::get('/admin/relais','RelaisController@show');
Route::post('/admin/relais/create','RelaisController@insert');
Route::post('/admin/relais/destroy','RelaisController@destroy');
Route::post('/admin/relais/{id}','RelaisController@update');

/**
 *产品分类路由
 */
Route::get('/admin/category','CategoryController@show');
Route::post('/admin/category/update','CategoryController@update');
Route::post('/admin/category/store','CategoryController@store');
Route::post('/admin/category/{id}','CategoryController@destroy');

/**
 * 新闻活动
 */
Route::get('/admin/news/create','NewsController@create');
Route::get('/admin/news/{id}','NewsController@edit');
Route::get('/admin/news/edit/{id}','NewsController@update');
Route::get('/admin/news{name?}','NewsController@show');
Route::post('/admin/news/create','NewsController@store');
Route::post('/admin/news/uploadImg','NewsController@upload');
Route::post('/admin/news/destroy','NewsController@destroy');
Route::post('/admin/news/edit/{id}','NewsController@storeUpdate');

//后台用户列表
Route::get('/admin/users',function(){
   return  view('user');
});
//积分设置
Route::get('/admin/point',function(){
   return view('point');
});
/**
 * 首页路由
 */
Route::get('/show',function(){
    $products=Product::groupBy('cat_id')->orderBy('cat_id','desc')->get();
    return view('app.index',compact('products'));
});

/*
 * menu展示
 */

Route::get('/menus/{cat?}','ProductController@getMenu');

Route::get('/test',function(){
   return view('test');
});

//Route::get('testViewHello',function(){
//    return view('welcome');
//});


/*
 * relais to json
 */
Route::get('/json','RelaisController@toJson');

//panier
Route::get('/panier',function(){
   return view('app.panier');
});

//connection
Route::get('/connection',function(){
    return view('app.connection');
});

Route::post('/cart','OrderController@store');
Route::get('/pointrelais',function(){
    return view('app.points');
});