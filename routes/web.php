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


/*App\User::create([

'name' => 'Alumno',
'email' => 'alumno@gmail.com',
'password' => bcrypt('123456'),
'role_id' => '2'

]);*/	

		Route::get('/', function () {
		    return view('auth.login');
		});

		Route::get('/errors', function () {
		    return view('errors.index');
		});	


		Route::get('roles',function(){

			return \App\Role::with('user')->get();

		});

		Route::get('cpanel', 'PanelController@index')->name('cpanel');


		

		Route::get('docente', 'PagesController@docente')->name('docente.view');

		Route::get('apoderado', 'PagesController@apoderado')->name('apoderado.view');





		Route::post('users',['as' => 'users.store','uses' => 'UsersController@store']);

		Route::get('users/create',['as' => 'users.create','uses' => 'UsersController@create']);

		Route::get('users/show',['as' => 'users.show','uses' => 'UsersController@show']);



		Route::get('users/{id}/edit',['as' => 'users.edit','uses' => 'UsersController@edit']);


		Route::delete('users/{id}',['as' => 'users.destroy','uses' => 'UsersController@destroy']);

		Route::put('users/{id}',['as' => 'users.update','uses' => 'UsersController@update']);



		Auth::routes();


