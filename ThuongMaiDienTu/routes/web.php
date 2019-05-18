<?php
use App\Models\Category;
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
View::composer('wraper.layout.navigation', function($view) {
    $categories =Category::where('parent_id','0')->get();
    // $categories =Category::all();
    $subCategories =Category::where('parent_id','!=','0')->get();
    $view->with(['categories'=> $categories,'subCategories'=>$subCategories]);
});
Route::get('/','HomeController@index')->name('home');
Route::get('product','HomeController@product')->name('product');
Route::get('detail/{id}','HomeController@detail')->name('detail');
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::get('register','Auth\RegisterController@register')->name('register');
Route::get('category/{id}','HomeController@category')->name('category');
Route::get('store','HomeController@store')->name('store');

Route::prefix('administrator')->group(function(){
    Route::get('login','Auth\LoginController@login')->name('login');
    Route::post('login','Auth\LoginController@processLogin')->name('login.post');
    Route::middleware(['sentinel.checkLogin'])->group(function (){
        
        Route::group([
            'prefix' => 'members',
            'middleware' => ['inRole'],
            'inRole' => ['admin']
        ],function(){
            Route::get('','Admin\MyController@index')->name('admin.index');
        });

        Route::group([
            'prefix' => 'products',
            'middleware' => ['inRole'],
            'inRole' =>['admin']
        ],function (){
            Route::get('list','Admin\Product\ProductController@index')->name('product.list');
            Route::get('create','Admin\Product\ProductController@create')->name('product.create');
            Route::post('create','Admin\Product\ProductController@store')->name('product.store');
            Route::get('edit/{id}','Admin\Product\ProductController@edit')->name('product.edit');
            Route::post('edit/{id}', 'Admin\Product\ProductController@update')->name('product.update');
            Route::delete('delete', 'Admin\Product\ProductController@delete')->name('product.delete');
        });
    });
});
