<?php

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

/*Route::get('/', function () {
    return view('hello', [
        'hi' => 'Hello everyone'
    ]);
});*/

Route::get('/', 'App\Http\Controllers\TestController@show');

Route::get('/test', function () {
    /*return [
        'firstName' => 'Oscar',
        'lastName' => 'Contreras'
    ];*/

    $id = request('id');

    $data = [
        'one' => 'You selected one',
        'two' => 'You selected two'
    ];

    if (!array_key_exists($id, $data)) {
        abort(404, 'Not found');
    }

    return $data[$id] ?? 'There is nothing';
});

/*Route::get('/data/{id}', function ($id) {
    $data = [
        'one' => 'You selected one',
        'two' => 'You selected two'
    ];

    if (!array_key_exists($id, $data)) {
        abort(404, 'Not found');
    }

    return $data[$id] ?? 'There is nothing';
});*/

Route::get('/data/{id}', 'App\Http\Controllers\HelloController@hello');

/** 
 * EJERCICIO:
 * 
 * Por medio de make:controller crear la clase HolaMundoController
 * con el método hola que devuelve el json {"hola": "holaMundo"}
 * y asociar a la ruta /hola
 * 
 * 12:00
 */

Route::get('/students', 'App\Http\Controllers\StudentController@getStudents');
Route::get('/studentadd', 'App\Http\Controllers\StudentController@showStudentAdd');
Route::get('/studentaddangular', 'App\Http\Controllers\StudentController@showStudentAddAngular');
Route::post('/students', 'App\Http\Controllers\StudentController@postStudent');
Route::get('/students/{id}', 'App\Http\Controllers\StudentController@getStudent');
Route::put('/students', 'App\Http\Controllers\StudentController@putStudent');

Route::get('/ajaxstudents', 'App\Http\Controllers\StudentAjaxController@getStudents');
Route::post('/ajaxstudents', 'App\Http\Controllers\StudentAjaxController@postStudent');
Route::put('/ajaxstudents', 'App\Http\Controllers\StudentAjaxController@putStudent');
Route::delete('/ajaxstudents/{id}', 'App\Http\Controllers\StudentAjaxController@deleteStudent');