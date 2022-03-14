<?php

use App\Models\Address;
use App\Models\User;
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

Route::get('/insert', function (){

   $user = User::findorfail(1);

   $address = new Address(['name'=>'1234 Houston avenue new york']);

   $user->address()->save($address);


});


Route::get('/update', function (){

    $address = Address::where('user_id', 1)->first();

    $address->name = "UPDATED 455 Alaska";

    $address->save();


});

Route::get('/read', function (){

    $user = User::find(1);

   echo $user->address->name;

});

//--DELETE---

Route::get('/delete', function (){

    $user = User::findorfail(1);

    $user->address()->delete();

    return "Deleted";

});
