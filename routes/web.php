<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    echo "当前访问是/home页面";
});
//必填参数any表示可以用任何方法访问
Route::any('/test/{id}', function($id){
	echo "当前的用户id：".$id;
});
//可选参数
Route::any('/test1/{id?}', function($id = ''){
	echo "当前的用户id：".$id;
});
//id通过get方法传递
Route::any('/test2', function(){
	echo "当前的用户id：".$_GET['id'];
});
Route::match(['post'],'/test1', function(){
	echo "这十个测试的test1页面";
});
//控制器路由
Route::get('/home/test/test1','TestController@test1');
Route::get('/home/test/test2','TestController@test2');
//控制器分目录路由
Route::get('/home/index/index','home\IestController@index');
Route::get('/admin/index/index','admin\IndexController@index');
//数据库的增删查改
Route::group(['prefix'=>'home/test'],function(){
	Route::get('add','TestController@add');
	Route::get('del','TestController@del');
	Route::get('update','TestController@update');
	Route::get('select','TestController@select');
});
//模型增删查改
Route::group(['prefix'=>'home/test'],function(){
	Route::get('Madd','TestController@Madd');
	Route::get('Mdel','TestController@Mdel');
	Route::get('Mupdate','TestController@Mupdate');
	Route::get('Mselect','TestController@Mselect');
});
//自动验证模板
Route::any('home/test/yanzheng','TestController@yanzheng');

Route::prefix('api')->get('/task','TestController@luyou')->name('web');
Route::any('/tables_name','TestController@table_name');



















