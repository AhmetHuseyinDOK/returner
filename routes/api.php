<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
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
Route::group(['middleware'=>'cors'],function(){

    Route::get('/info',function(Request $request){
        return 'info';
    });

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group([ "middleware" => "client"],function(){   
        Route::post('/view',"Client\ViewController@create");    
        Route::get('/view',"Client\ViewController@get")->name("user.client.view.save");
    });

});