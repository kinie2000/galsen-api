<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\renting;
use App\Http\Controllers\Authentificationcontroller;
use App\Http\Controllers\ForgetpasswordController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\VehicleController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::group(['middleware' => ['web']], function () {
    // your routes here
    Route::post('renting', [RentingController::class, 'create']);
Route::get('fetchMessages', [MessageController::class, 'fetchMessages']);
Route::post('message', [MessageController::class, 'message']);
Route::get('show', [RentingController::class, 'show']);
Route::get('showonelocation/{id}', [RentingController::class, 'showonelocation']);
Route::get('delete/{id}', [RentingController::class, 'delete']);

Route::post('forgetPassword',[forgetPasswordController::class,'generateCodeValidation']);
//routes pour le mot de passe
Route::post('verifyCode',[ForgetpasswordController::class,'verifiyCodeUser']);
Route::post('changePassword',[ForgetpasswordController::class,'changePassword']);
Route::post('changePasswordUnik',[ForgetpasswordController::class,'changePasswordUnik']);
Route::post('changeEmail',[ForgetpasswordController::class,'changeEmail']);
Route::post('getTokenAndRefreshToken', [ForgetpasswordController::class, 'getTokenAndRefreshToken']);
Route::get('auth/{social}',[SocialController::class, 'redirection']);
Route::get('auth/{social}/callback',[SocialController::class, 'conextion']);
// });
//routes pour l'utilisateur
Route::post('register', [Authentificationcontroller::class, 'register']);
Route::post('login', [Authentificationcontroller::class, 'login']);
Route::get('userInfo', [Authentificationcontroller::class, 'userInfo']);
Route::post('updateUser', [Authentificationcontroller::class, 'updateUser']);
Route::post('getinfoUser', [Authentificationcontroller::class, 'getinfoUser']);


//Routes pour les notifications
Route::post('createnotif', [NotificationController::class, 'create']);
Route::post('findnotif', [NotificationController::class, 'findnotif']);
// Route::middleware('auth:api')->group(function () {
// Route::get('getuser', [Authentificationcontroller::class, 'userInfo']);

// });

//routes pour les voitures
Route::post('addcar', [VehicleController::class, 'create']);
Route::post('showModel', [VehicleController::class, 'showModel']);
Route::post('showType', [VehicleController::class, 'showType']);
Route::post('showEnergie', [VehicleController::class, 'showEnergie']);
Route::post('showBoitVit', [VehicleController::class, 'showBoitVit']);
Route::post('showNbplace', [VehicleController::class, 'showNbplace']);
Route::post('showNbporte', [VehicleController::class, 'showNbporte']);
Route::post('saveimage', [VehicleController::class, 'saveimage']);
Route::get('showMark', [VehicleController::class, 'showMark']);
Route::post('storecaracteristique', [VehicleController::class, 'storecaracteristique']);
Route::get('getallvehicle', [VehicleController::class, 'getallvehicle']);
Route::post('suprimeCar', [VehicleController::class, 'suprimeCar']);
Route::post('findCar', [VehicleController::class, 'findCar']);
Route::post('updateCar',[VehicleController::class, 'updateCar']);
Route::post('recupimage',[VehicleController::class, 'recupimage']);



Route::post('renting', [renting::class, 'create']);
Route::get('index', [renting::class, 'index']);



// Route::post('register', [Authentificationcontroller::class, 'register']);
// Route::post('login', [Authentificationcontroller::class, 'login']);

// Route::get('all', [Authentificationcontroller::class, 'all']);
 /* 
Route::middleware('auth:api')->group(function () {
    Route::get('user', [Authentificationcontroller::class, 'userInfo']);
    Route::resource('products', [Authentificationcontroller::class, 'userInfo']);
});*/

