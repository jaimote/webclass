<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
/**
 * FALLLBACK para retorno JSON de URL no encontrada en API.
 * @author Eduardo 'D14BL0' Rodríguez B.
 */
Route::fallback(function () {
	return response()->json(['error' => '¡API URL No encontrada!'], 404);
});

Route::group(['prefix' => 'student'], function () {
    Route::get('getAllBySchoolID', 'StudentController@getAllBySchoolID')->name('getAllBySchoolID');
    Route::get('getStudentByID', 'StudentController@getStudentByID')->name('getStudentByID');
});
