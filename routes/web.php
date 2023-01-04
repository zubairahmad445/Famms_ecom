<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/view_category',[AdminController::class,'view_category']);
Route::get('/view_product',[AdminController::class,'view_product']);
Route::get('/all_product',[AdminController::class,'all_product']);
Route::get('/view_oder',[AdminController::class,'view_oder']);
Route::post('/add_category',[AdminController::class,'add_category']);
Route::post('/add_product',[AdminController::class,'add_product']);
Route::get('/editcategories/{id}',[AdminController::class,'editcategories'])->name('editcategories');
Route::post('/updatecategories/{id}',[AdminController::class,'updatecategories'])->name('updatecategories');
Route::get('/categorydelete/{id}',[AdminController::class,'categorydelete'])->name('categorydelete');
Route::get('/editproducts/{id}',[AdminController::class,'editproducts'])->name('editproducts');
Route::post('/updateproducts/{id}',[AdminController::class,'updateproducts'])->name('updateproducts');
Route::get('/productdelete/{id}',[AdminController::class,'productdelete'])->name('productdelete');
Route::get('/delivered/{id}',[AdminController::class,'delivered']);
Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);
Route::get('/send_email/{id}',[AdminController::class,'send_email']);
Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email'])->name('send');
Route::get('/search',[AdminController::class,'search']);




Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/product_details/{id}',[HomeController::class,'product_details']);
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/show_oder',[HomeController::class,'show_oder']);
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
Route::get('/cash_oder',[HomeController::class,'cash_oder']);
Route::get('/stripe/{total}',[HomeController::class,'stripe']);
Route::post('/stripepost/{total}',[HomeController::class,'stripePost'])->name('stripe.post');
Route::get('/cancel_oder/{id}',[HomeController::class,'cancel_oder']);
Route::post('/add_comment',[HomeController::class,'add_comment']);
Route::post('/add_reply',[HomeController::class,'add_reply']);
Route::get('/pro_search',[HomeController::class,'pro_search']);
Route::get('/search_pro',[HomeController::class,'search_pro']);
Route::get('/product',[HomeController::class,'product']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/blog',[HomeController::class,'blog']);
Route::get('/contact',[HomeController::class,'contact']);


Route::get('/testimotional',[HomeController::class,'testimotional']);





