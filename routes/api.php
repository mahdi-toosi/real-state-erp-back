<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => "v1"] , function(){
    
    Route::group(['middleware' => 'api', 'prefix' => 'auth' ], function ($router) {

        Route::post('login', [AuthController::class , "login"] );
        Route::post('logout', [AuthController::class , "logout"] );
        Route::post('refresh', [AuthController::class , "refresh"] );
        Route::post('me', [AuthController::class , "me"] );

    });



    Route::get("users" , [ UserController::class , "index" ]);


});


// Route::get("permission" , function(){
//     auth()->user()->givePermissionsTo("delete" , "help" , "manage");
//     dd(auth()->user()->can("help"));
//     dd(auth()->user()->refreshRoles("admin"));
// });


// Route::get("role" , function(){
//     Role::find(1)->givePermissionsTo("delete" , "help");
//     auth()->user()->giveRolesTo("admin");
//     var_dump(auth()->user()->can("manage"));
// });