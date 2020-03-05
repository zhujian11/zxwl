<?php

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


/* 
|------------
| 前台模块 
|------------

*/

/* 首页路由 */
Route::get('/', 'Home\HomeController@index');

/* 产品与服务路由 */
Route::get('fuwu','Home\HomeController@fuwu');
Route::get('fuwu/detail/{id}','Home\HomeController@fuwuDetail')->name('fuwuDetail');

/* 新闻资讯路由 */
Route::get('news','Home\HomeController@news');
Route::get('news/detail/{id}','Home\HomeController@newsDetail')->name('newsDetail');

/* 栏目详情页 */
Route::get('category/detail/{id}','Home\HomeController@cateDetail')->name('cateDetail');

/* 搜索关键字路由 */
Route::get('keywords','Home\HomeController@search')->name('searchKeywords');




/* 
|------------
| 后台模块 
|------------

*/

/* 登录路由 */
Route::view('admin/login','admin.login');

/* 处理登录路由 */
Route::post('admin/dologin','Admin\LoginController@doLogin')->name('doLogin');

Route::middleware(['islogin'])->group(function(){

	/* 首页路由 */

	Route::get('admin/index',function(){
		return view('admin.index');
	});

	Route::view('admin/welcome','admin.welcome');

	/* 退出登录路由 */

	Route::get('admin/loginout','Admin\LoginController@loginOut')->name('loginOut');

	/* 用户模块资源路由 */

	Route::get('admin/user/passreset/{id}','Admin\UserController@passReset')->name('passreset');//显示修改密码页面

	Route::post('admin/user/doreset','Admin\UserController@doReset')->name('doReset');//处理密码修改

	Route::get('admin/user/onlyeditemail','Admin\UserController@onlyEditEmail')->name('onlyEditUserEmail');

	Route::get('admin/user/onlyeditname','Admin\UserController@onlyEditName')->name('onlyEditUserName');

	Route::get('admin/user/onlyname','Admin\UserController@onlyName')->name('onlyName');

	Route::get('admin/user/onlyemail','Admin\UserController@onlyEmail')->name('onlyEmail');

	Route::get('admin/user/search','Admin\UserController@search')->name('searchUser');

	Route::resource('admin/user','Admin\UserController');

	/* 服务模块资源路由 */

	Route::get('admin/fuwu/onlyname','Admin\FuwuController@onlyName')->name('onlyFuwuName');

	Route::get('admin/fuwu/onlyeditname','Admin\FuwuController@onlyEditName')->name('onlyEditFuwuName');

	Route::get('amdin/fuwu/search','Admin\FuwuController@search')->name('search');

	Route::resource('admin/fuwu','Admin\FuwuController');

	/* 文件上传路由 */

	Route::post('admin/upload','Admin\UploadController@upload')->name('upload');

	Route::post('admin/uploads','Admin\UploadController@uploads')->name('uploads');

	/* 栏目模块资源路由 */

	Route::get('admin/category/hasson','Admin\CategoryController@hasSon');

	Route::get('admin/category/onlyeditname','Admin\CategoryController@onlyEditName')->name('onlyEditCateName');

	Route::get('admin/category/name','Admin\CategoryController@onlyName')->name('onlyCateName');

	Route::get('admin/category/search','Admin\CategoryController@search')->name('searchCate');

	Route::resource('admin/category','Admin\CategoryController');

	/* 新闻资讯模块路由 */

	Route::get('admin/news/search','Admin\NewsController@search')->name('searchNews');

	Route::resource('admin/news','Admin\NewsController');

	/* 网站配置模块路由 */

	Route::get('admin/config/putcontent','Admin\ConfigController@putContent');

	Route::get('admin/config/onlyeditname','Admin\ConfigController@onlyEditName')->name('onlyEditConfigName');

	Route::get('admin/config/onlyname','Admin\ConfigController@onlyName')->name('onlyConfigName');

	Route::resource('admin/config','Admin\ConfigController');

	/* 轮播图模块路由 */

	Route::resource('admin/carousel','Admin\CarouselController');


});

