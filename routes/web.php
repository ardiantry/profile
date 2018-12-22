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


Route::get('/admin', function () {return redirect('/admin/home');});

Route::group(['prefix' => 'admin'], function () {	
	Route::group(['namespace' => 'admin'], function () {
		Route::group(['middleware' => 'My-Middleware'], function (){ 
			
			Route::get('/home', 'HomeController@index')->name('home');
			
			//setting untuk tampilan home
			Route::get('/menu-home', 'menuhomeController@menuhome')->name('menuhome');
			Route::post('/simpanmenuhome', 'menuhomeController@simpanmenuhome')->name('simpanmenuhome');
			Route::post('/update-home', 'menuhomeController@updatehome')->name('updatehome');
			Route::get('/hapusmenu/{id}', 'menuhomeController@hapusmenu')->name('hapusmenu');

			Route::post('/simpansocialmedia', 'menuhomeController@simpansocialmedia')->name('simpansocialmedia');
			Route::get('/hapussosmed/{id}', 'menuhomeController@hapussosmed')->name('hapussosmed');



			Route::post('/simpanslider', 'menuhomeController@simpanslider')->name('simpanslider');
			Route::post('/updateslider', 'menuhomeController@updateslider')->name('updateslider');
			Route::get('/hapus-Slider/{id}', 'menuhomeController@hapus_Slider')->name('hapusSlider');
			
			



			Route::post('/simpanTema', 'menuhomeController@simpanTema')->name('simpanTema');
			Route::post('/UpdateTema', 'menuhomeController@UpdateTema')->name('UpdateTema');
			Route::get('/hapustema/{id}', 'menuhomeController@hapustema')->name('hapustema');

			Route::post('/simpanpost', 'menuhomeController@simpanpost')->name('simpanpost');

			Route::get('/hapuspost/{id}', 'menuhomeController@hapuspost')->name('hapuspost');

			Route::get('/showeditpost', 'menuhomeController@showeditpost')->name('showeditpost');
				// end setting untuk tampilan home
		});
	Route::get('/login', 'Auth\LoginController@showLoginForm');
	Route::post('/login', 'Auth\LoginController@login')->name('admin.login');
	Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');
	Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('/register', 'Auth\RegisterController@register');
	
	});

});

//Auth::routes();