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
Route::group(['middleware' => ['auth']], function () {
    Route::resource('client', 'clientController');
    });
    // Route::group(['middleware' => ['auth']], function () {
    //     Route::('client', 'clientController');
    //     });

Route::get('/accueil','clientController@accueil')->name('pages.accueil');
Route::get('client/show-add/{id}','clientController@ajouter')->name('gestion.ajouter');
Route::post('client/add/','clientController@ajout')->name('gestion.ajout');
Route::get('client/show-retrait/{id}','clientController@retraits')->name('gestion.retraits');
Route::post('client/retrait/','clientController@retrait')->name('gestion.retrait');
Route::post('client/verify','clientController@verifier')->name('client.verifier');
/*
****


****
*/
Route::get('client/{id}/information', 'clientController@lolipop')->name('client.information');

Auth::routes();
Route::post("compte",'clientController@insertion')->name('gestion.insertion');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('client/virement/{id}','clientController@virer')->name('gestion.virer');
Route::post('client/virements','clientController@virement')->name('gestion.virement');
Route::delete('client/force/{id}', 'clientController@forceDestroy')->name('client.force.destroy');
Route::get('client/restore/{id}', 'clientController@restore')->name('client.restore');
 //route::get("send_mail","clientController@mailsend")->name('gestion.contact');
Route::get('/deconnexion', function(){
    auth()->logout();
    return redirect('/');


});
