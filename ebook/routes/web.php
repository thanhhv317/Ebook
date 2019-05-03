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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test',function(){
	return view('admin.master');
});

Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'book'],function(){
		Route::get('add',['as'=>'admin.book.getAdd','uses'=>'BookController@getAdd']);
		Route::post('add',['as'=>'admin.book.postAdd','uses'=>'BookController@postAdd']);
		Route::get('list',['as'=>'admin.book.getList','uses'=>'BookController@getList']);
		Route::get('edit/{id}',['as'=>'admin.book.getEdit','uses'=>'BookController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.book.postEdit','uses'=>'BookController@postEdit']);
		Route::get('delimg/{id}',['as'=>'admin.book.getDelImg','uses'=>'BookController@getDelImg']);
		Route::get('delete/{id}',['as'=>'admin.book.getDelete','uses'=>'BookController@getDelete']);
		Route::get('detail/{id}',['as'=>'admin.book.getDetail','uses'=>'BookController@getDetail']);
		Route::get('print',['as'=>'admin.book.getPrint','uses'=>'BookController@getPrint']);
		Route::get('pdf',['as'=>'admin.book.getPdf','uses'=>'BookController@getPdf']);
		Route::get('excel',['as'=>'admin.book.getExcel','uses'=>'BookController@getExcel']);
		Route::get('import',['as'=>'admin.book.getImport','uses'=>'BookController@getImport']);
		Route::post('import',['as'=>'admin.book.postImport','uses'=>'BookController@postImport']);

	});
	Route::group(['prefix'=>'author'],function(){
		Route::get('add',['as'=>'admin.author.getAdd','uses'=>'AuthorController@getAdd']);
		Route::post('add',['as'=>'admin.author.postAdd','uses'=>'AuthorController@postAdd']);
		Route::get('list',['as'=>'admin.author.getList','uses'=>'AuthorController@getList']);
		Route::get('edit/{id}',['as'=>'admin.author.getEdit','uses'=>'AuthorController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.author.postEdit','uses'=>'AuthorController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.author.getDelete','uses'=>'AuthorController@getDelete']);
		Route::get('detail/{id}',['as'=>'admin.author.getDetail','uses'=>'AuthorController@getDetail']);
		Route::get('print',['as'=>'admin.author.getPrint','uses'=>'AuthorController@getPrint']);
		Route::get('pdf',['as'=>'admin.author.getPdf','uses'=>'AuthorController@getPdf']);
		Route::get('excel',['as'=>'admin.author.getExcel','uses'=>'AuthorController@getExcel']);
		
	});
	Route::group(['prefix'=>'kind'],function(){
		Route::get('add',['as'=>'admin.kind.getAdd','uses'=>'KindController@getAdd']);
		Route::post('add',['as'=>'admin.kind.postAdd','uses'=>'KindController@postAdd']);
		Route::get('list',['as'=>'admin.kind.getList','uses'=>'KindController@getList']);
		Route::get('edit/{id}',['as'=>'admin.kind.getEdit','uses'=>'KindController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.kind.postEdit','uses'=>'KindController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.kind.getDelete','uses'=>'KindController@getDelete']);
		Route::get('detail/{id}',['as'=>'admin.kind.getDetail','uses'=>'KindController@getDetail']);
		Route::get('print',['as'=>'admin.kind.getPrint','uses'=>'KindController@getPrint']);
		Route::get('pdf',['as'=>'admin.kind.getPdf','uses'=>'KindController@getPdf']);
		Route::get('excel',['as'=>'admin.kind.getExcel','uses'=>'KindController@getExcel']);
	});
	Route::group(['prefix'=>'publisher'],function(){
		Route::get('add',['as'=>'admin.publisher.getAdd','uses'=>'PublisherController@getAdd']);
		Route::post('add',['as'=>'admin.publisher.postAdd','uses'=>'PublisherController@postAdd']);
		Route::get('list',['as'=>'admin.publisher.getList','uses'=>'PublisherController@getList']);
		Route::get('edit/{id}',['as'=>'admin.publisher.getEdit','uses'=>'PublisherController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.publisher.postEdit','uses'=>'PublisherController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.publisher.getDelete','uses'=>'PublisherController@getDelete']);
		Route::get('detail/{id}',['as'=>'admin.publisher.getDetail','uses'=>'PublisherController@getDetail']);
		Route::get('print',['as'=>'admin.publisher.getPrint','uses'=>'PublisherController@getPrint']);
		Route::get('pdf',['as'=>'admin.publisher.getPdf','uses'=>'PublisherController@getPdf']);
		Route::get('excel',['as'=>'admin.publisher.getExcel','uses'=>'PublisherController@getExcel']);
	});
	Route::group(['prefix'=>'home'],function(){
		//slide
		Route::get('list',['as'=>'admin.home.getList','uses'=>'PageHomeController@getList']);
		Route::get('add',['as'=>'admin.home.getAdd','uses'=>'PageHomeController@getAdd']);		
		Route::post('add',['as'=>'admin.home.postAdd','uses'=>'PageHomeController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.home.getEdit','uses'=>'PageHomeController@getEdit']);		
		Route::post('edit/{id}',['as'=>'admin.home.postEdit','uses'=>'PageHomeController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.home.getDelete','uses'=>'PageHomeController@getDelete']);
		Route::get('editAll',['as'=>'admin.home.getEditAll','uses'=>'PageHomeController@getEditAll']);	
		Route::post('editAll',['as'=>'admin.home.postEditAll','uses'=>'PageHomeController@postEditAll']);	

		//banner
		Route::get('addbn',['as'=>'admin.home.getAddBanner','uses'=>'PageHomeController@getAddBanner']);		
		Route::post('addbn',['as'=>'admin.home.postAddBanner','uses'=>'PageHomeController@postAddBanner']);
		Route::get('editbn/{id}',['as'=>'admin.home.getEditBanner','uses'=>'PageHomeController@getEditBanner']);
		Route::post('editbn/{id}',['as'=>'admin.home.postEditBanner','uses'=>'PageHomeController@postEditBanner']);
	});
});

// in client
Route::get('home',['as'=>'getHome','uses'=>'HomeController@getHome']);
Route::get('product',['as'=>'getProduct','uses'=>'HomeController@getProduct']);
Route::get('blog',['as'=>'getBlog','uses'=>'HomeController@getBlog']);
Route::get('product-detail/{id}',['as'=>'getProductDetail','uses'=>'HomeController@getProductDetail']);
Route::get('about',['as'=>'getAbout','uses'=>'HomeController@getAbout']);
Route::get('contact',['as'=>'getContact','uses'=>'HomeController@getContact']);
Route::get('cart',['as'=>'getCart','uses'=>'HomeController@getCart']);


