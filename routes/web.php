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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('professores', 'TeacherController@index')->name('teachers.index');
    Route::get('professores/:id', 'TeacherController@show')->name('teacher.show');
    Route::post('professores', 'TeacherController@index')->name('teacher.store');

    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
    Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);

    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('turnos', 'TurnoController@index')->name('turno.index');

    Route::get('series', 'SerieController@index')->name('serie.index');

    Route::get('turmas', 'TurmaController@index')->name('turma.index');

    Route::get('alunos', 'AlunoController@index')->name('aluno.index');

    Route::get('matriculas', 'MatriculaController@index')->name('matricula.index');
});
