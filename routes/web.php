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


Route::group(['middleware'=>['adminAuth']],function(){
    Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
        Route::get('/','IndexController@index');
        Route::get('index','IndexController@index');

        Route::get('categoryList','ArticleController@categoryList');
        Route::any('createCategory','ArticleController@createCategory');
        Route::any('addCategory','ArticleController@addCategory');
        Route::any('checkCategory','ArticleController@checkCategory');

        Route::any('createArticle','ArticleController@createArticle');
        Route::any('addArticle','ArticleController@addArticle');
        //文章列表页
        Route::get('articleList','ArticleController@articleList');
    });


        });


