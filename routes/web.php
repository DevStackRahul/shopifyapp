<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\MYshopmodel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|billable
*/
   
  Route::get('/', function () {
      return redirect()->route('home');
 })->middleware(['auth.shopify','billable'])->name('home');
 
 //This will redirect user to login page.
  Route::get('/login', function(){
    if(Auth::user()) {
      return redirect()->route('home');
    }else
      return view('login');
   

})->name('login');

Route::get('/setup', 'Usercontroller@index')->middleware(['auth.shopify'])->name('home');

Route::get('/products', 'Usercontroller@products')->middleware(['auth.shopify'])->name('products');

Route::get('/design', 'Usercontroller@design')->middleware(['auth.shopify'])->name('design');

Route::get('/bundle-details', 'Usercontroller@bundle_details')->middleware(['auth.shopify'])->name('bundle-details');

Route::post('autocomplete-search', 'Usercontroller@autocompleteSearch')->middleware(['auth.shopify'])->name('autocomplete-search');



Route::post('/post-setup', 'Usercontroller@post_setup')->middleware(['auth.shopify'])->name('post-setup');

Route::post('/post-products', 'Usercontroller@post_products')->middleware(['auth.shopify'])->name('post-products');

Route::post('/post-design', 'Usercontroller@post_design')->middleware(['auth.shopify'])->name('post-design');

Route::get('delete-bundle/{id}', 'Usercontroller@delete_bundle')->middleware(['auth.shopify'])->name('delete-bundle');
Route::get('/edit-bundle/{id}', 'Usercontroller@edit_bundle')->middleware(['auth.shopify'])->name('edit-bundle');

/***********************************/
Route::post('/check-image', 'Usercontroller@check_image')->middleware(['auth.shopify'])->name('check-image');

/***********************************/


Route::post('/post-edit', 'Usercontroller@post_edit')->middleware(['auth.shopify'])->name('post-edit');

/************************ created snippet code here ***********/ 

Route::get('/snippet', 'Usercontroller@snippet')->middleware(['auth.shopify'])->name('snippet');

/**************************************************************/ 
 
 Route::get('/test', 'Usercontroller@test')->middleware(['auth.shopify'])->name('test');


