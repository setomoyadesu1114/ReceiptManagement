<?php

use Illuminate\Support\Facades\Auth;
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
    return view('/auth/login');
});
//ユーザー関連
    //　　ログイン
route::get('auth/login','App\\Http\\Controllers\\ShopController@login');
    //　　ユーザー登録
route::get('user_create','App\\Http\\Controllers\\ShopController@user_create');

Route::group(['middleware' => ['auth']], function() {


    //shop関連
Route::prefix('shop')->group(function(){
    //    一覧ページ
    Route::get("index", "App\\Http\\Controllers\\ShopController@index")->name('shop.index');
    //    詳細ページ
    Route::get('show/{id}', "App\\Http\\Controllers\\ShopController@show")->name('shop.show');

    //    新規作成
    Route::get("create", "App\\Http\\Controllers\\ShopController@create")->name('shop.create');
    //    登録
    Route::post("store", "App\\Http\\Controllers\\ShopController@store")->name('shop.store');
    //    削除
    Route::post("destroy/{id}", "App\\Http\\Controllers\\ShopController@destroy")->name('shop.destroy');

    //    shop編集
    Route::get("edit/{id}", "App\\Http\\Controllers\\ShopController@edit")->name('shop.edit');
    //    shop更新
    //　　レシート新規
    Route::post("update/{id}", "App\\Http\\Controllers\\ShopController@update")->name('shop.update');

    Route::get("receipt/create", "App\\Http\\Controllers\\ReceiptController@create")->name('receipt.create');
    //　　レシート保存
    Route::post("receipt/store", "App\\Http\\Controllers\\ReceiptController@store")->name('receipt.store');
    //    レシート削除
    Route::post("receipt/destroy/{id}", "App\\Http\\Controllers\\ReceiptController@destroy")->name('receipt.destroy');
//    レシート編集
    Route::get("receipt/edit/{id}", "App\\Http\\Controllers\\ReceiptController@edit")->name('receipt.edit');
//    レシート更新
    Route::post("receipt/update/{id}", "App\\Http\\Controllers\\ReceiptController@update")->name('receipt.update');

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




