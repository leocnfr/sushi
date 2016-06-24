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
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('admin/login', 'Admin\AuthController@getLogin');
    Route::post('admin/login', 'Admin\AuthController@postLogin');
//    Route::get('admin/register', 'Admin\AuthController@getRegister');
//    Route::post('admin/register', 'Admin\AuthController@postRegister');
    Route::get('admin', 'ProductController@index');
    Route::get('/admin/logout','Admin\AuthController@getLogout');
    /**
     * PRODUCT 产品路由
     */
    Route::get('/admin/products{cateBy?}','ProductController@show');
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
    Route::get('/admin/users{query?}','UserController@showAll');
    Route::delete('/admin/users','UserController@destroy');
    Route::get('/admin/users/{id}','UserController@edit');
//积分设置
    Route::get('/admin/points',['middleware'=>'auth:admin',function(){
        return view('point');
    }]);
    //送餐时间设置
    Route::get('/admin/times',['middleware'=>'auth:admin',function(){
        return view('times');
    }]);
    Route::post('/admin/times','TimeController@store');
    Route::delete('/admin/times','TimeController@destroy');
    //订单管理
    Route::get('/admin/order/today','OrderController@index');
    Route::get('/admin/order/all','OrderController@all');

});

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/admin','ProductController@index');
//Route::get('admin', function () {
//    return view('admin.admin_template');
//});

/**
 * 首页路由
 */


//Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/show',function(){
        $products=Product::groupBy('cat_id')->orderBy('cat_id','desc')->get();
        return view('app.index',compact('products'));
    });

    /*
     * menu展示
     */

    Route::get('/menus/{cat?}','FrontController@getMenu');

    Route::get('/test',function(){
        return view('test');
    });

//Route::get('testViewHello',function(){
//    return view('welcome');
//});


    /*
     * relais to json
     */
    Route::get('/json','FrontController@toJson');

//panier
    Route::get('/panier','OrderController@panier');
//删除购物车
    Route::post('/deletePanier','OrderController@destroy');

//connection
    Route::get('/connexion',function(){
        return view('app.connection');
    });
//注册
    Route::post('register', 'Auth\AuthController@postRegister');
    Route::post('login','Auth\AuthController@postLogin');
//购物车数据
    Route::post('/delCart','OrderController@destroy');
    Route::post('/cart','OrderController@store');
    Route::get('/cartJson','OrderController@toJson');
    Route::get('/pointrelais',function(){
        return view('app.points');
    });
//商品数量的增删
    Route::post('/updateCart','OrderController@update');
//获得营业时间
    Route::get('/timeJson','JsonController@getTime');
//付款
    Route::post('/payment',function(){

    });

    Route::get('/compte',function(){
        return view('app.compte');
    });
    Route::post('/saveInfo','UserController@saveInfo');
    Route::post('/saveOrder','OrderController@saveOrder');
    Route::get('/pdf','PdfController@create');
    Route::get('/news','FrontController@news');
});

