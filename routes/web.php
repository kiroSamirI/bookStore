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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){

    return 'hello world';

});

Route::get('/{name}/{id}', function($name, $id){

    return 'hello '.$name.'Your id is '.$id;

});
*/





Route::get('/','pagesController@index');


Route::get('/about', 'pagesController@about');
Route::get('/services','pagesController@services');

Route::resource('/books','booksController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::post('/login/custom', [
    
    'uses' => 'logController@login',
    'as' => 'login.custom'

]); 

Route::resource('user','userController');
Route::get('/listBooks', 'adminPagesController@listBooks');

Route::get('/listUsers', 'adminPagesController@listUsers');


Route::group(['middleware' => 'auth'], function() {
    
    
    Route::get('/adminHome', 'adminPagesController@adminIndex')->name('/adminHome');
    
    Route::get('/index','userController@index')->name('/index');
    
});





Route::post('/payment' , function(){
   // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
//dd($_POST);
\Stripe\Stripe::setApiKey("sk_test_skE6xtWOoxPacDtaDGccWVkT");

    // Token is created using Checkout or Elements!
    // Get the payment token ID submitted by the form:
    $token = $_POST['stripeToken'];
    $charge = \Stripe\Charge::create([
        'amount' => 999,
        'currency' => 'usd',
        'description' => 'Example charge',
        'source' => $token,
    ]);
    
});

Route::get('/payment' , function(){
    return view('welcome');
});