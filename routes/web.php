<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SeasonsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('/customers/home/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user-info', [UserController::class, 'userInfo'])->name('users.userInfo');

Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('products/{product}/show',[App\Http\Controllers\ProductsController::class,'details']) ->name("products.show");
Route::get('products/productsviews',[App\Http\Controllers\ProductsController::class,'productsviews']) ->name("products.productsviews");
Route::get('services/servicesviews',[App\Http\Controllers\ServicesController::class,'servicesviews']) ->name("services.servicesviews");
Route::get('products/{product}/showviews',[App\Http\Controllers\ProductsController::class,'productDetails']) ->name("products.showviews");

Route::group(['middleware' => ['auth', 'checkRole:1']], function () {

//RUTAS USUARIOS - CAMBIO DE CONTRASEÑA

Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}/update1', [UserController::class, 'update1'])->name('users.update1');
Route::put('/users/{id}/myacount', [UserController::class, 'upMyacount'])->name('users.upMyacount');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/delete', [UserController::class, 'delete'])->name('user.delete');
Route::get('/users/create', [UserController::class, 'showCreate'])->name('users.showCreate');
Route::post('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/changePassword', [UserController::class, 'showPassword'])->name('users.showPassword');
Route::get('change-password', [App\Http\Controllers\ChangePasswordController::class, 'show'])->name('password.change');
Route::post('change-password',[App\Http\Controllers\ChangePasswordController::class, 'update'])->name('password.update');
Route::get('users/{id}/activeUser', [UserController::class, 'activeUser'])->name('users.activeUser');
Route::get('users/{id}/disableUser', [UserController::class, 'disableUser'])->name('users.disableUser');

//RUTAS PRODUCTOS
Route::get('products/{id}/desactivar', [ProductsController::class, 'disableProducts'])->name('products.disableProducts');
Route::get('products/{id}/activar', [ProductsController::class, 'activeProducts'])->name('products.activeProducts');
Route::post('/products/{products}', [ProductsController::class, 'update'])->name('products.update');
Route::resource('/products', ProductsController::class)->names('products');

//RUTAS PQRS
Route::get('/pqrs', [App\Http\Controllers\PqrsController::class, 'index'])->name('pqrs.index');
Route::get('/pqrs/create', [App\Http\Controllers\PqrsController::class, 'showCreate'])->name('pqrs.showCreate');
Route::get('/pqrs/{pqr}/update', [PqrsController::class, 'view_pqrs'])->name('pqrs.update');
Route::post('/pqrs/create', [PqrsController::class, 'create'])->name('pqrs.create');
Route::put('/pqrs/{id}/delete', [PqrsController::class, 'delete'])->name('pqrs.delete');
Route::put('/pqrs/{id}/update', [PqrsController::class, 'update'])->name('pqrs.update');


// RUTAS SERVICIOS

//Rutas Servicios
Route::get('services/{id}/disable', [App\Http\Controllers\ServicesController::class, 'disableServices'])->name('services.disableServices');
Route::get('services/{id}/active', [App\Http\Controllers\ServicesController::class, 'activeServices'])->name('services.activeServices');
Route::resource('/services', ServicesController::class)->names('services');

//Rutas de la tabla detalles servicios
Route::get('services/{services}/addDetail',[App\Http\Controllers\ServicesController::class,'addDetail']) ->name("services.addDetail");
Route::post('services/{services}/createDetail',[App\Http\Controllers\ServicesController::class,'createDetail']) ->name("services.createDetail")
->middleware('auth');
Route::get('services/{services}/showDetails', [App\Http\Controllers\ServicesController::class, 'showDetails'])->name('services.showDetails');
Route::get('services/detailEdit/{id}/{de}',[App\Http\Controllers\ServicesController::class,'detailEdit']) ->name("services.detailEdit");
Route::get('/services/detailUpdate/{id}/{de}', [App\Http\Controllers\ServicesController::class, 'detailUpdate'])->name('services.detailUpdate');
Route::get('services/{id}/disabledetail', [App\Http\Controllers\ServicesController::class, 'disableDetailServices'])->name('services.disableDetailServices');
Route::get('services/{id}/activedetail', [App\Http\Controllers\ServicesController::class, 'activeDetailServices'])->name('services.activeDetailServices');

//Rutas tabla Resources Imagenes
Route::get('services/addImage/{id}/{de}',[App\Http\Controllers\ServicesController::class,'addImage']) ->name("services.addImage");
Route::post('services/storeImage/{id}/{de}',[App\Http\Controllers\ServicesController::class,'storeImage']) ->name("services.storeImage");
Route::get('services/editImg/{id}/{im}/{de}',[App\Http\Controllers\ServicesController::class,'editImg']) ->name("services.editImg");
Route::get('services/captureImg/{id}/{de}',[App\Http\Controllers\ServicesController::class,'captureImg']) ->name("services.captureImg");
Route::post('/services/updateImg/{id}/{im}/{de}', [App\Http\Controllers\ServicesController::class, 'updateImg'])->name('services.updateImg');
Route::get('/services/oldImg/{id}/{de}', [App\Http\Controllers\ServicesController::class, 'oldImg'])->name('services.oldImg');
Route::get('services/{id}/activeimg', [App\Http\Controllers\ServicesController::class, 'activeImg'])->name('services.activeImg');
Route::get('services/{id}/disableimg', [App\Http\Controllers\ServicesController::class, 'disableImg'])->name('services.disableImg');

//RUTAS RESERVAS
Route::get('/bookings', [App\Http\Controllers\BookingsController::class, 'index'])->name('bookings.index');
Route::get('/bookings/{book}', [App\Http\Controllers\BookingsController::class, 'show'])->name('bookings.show');
Route::get('/bookings/{booking}/delete', [App\Http\Controllers\BookingsController::class, 'destroy'])->name('bookings.delete');

});

//RUTAS REGISTER
Route::get('register', '\App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', '\App\Http\Controllers\Auth\RegisterController@register');

//RUTAS CARRITO DE COMPRAS
Route::get('showShoppingCart',[App\Http\Controllers\ProductsController::class,'showShoppingCart']) ->name("showShoppingCart");
Route::get('products/clearcar',[App\Http\Controllers\ProductsController::class,'clearcar']) ->name("products.clearcar");
Route::get('products/{id}/shopingcar/{cantidad}',[ProductsController::class, 'updateShopingcar'])->name('products.updateShopingcar');
Route::get('products/showcar',[ProductsController::class, 'showcar'])->name('products.showcar');
Route::get('products/productDetails',[ProductsController::class, 'productDetails'])->name('products.productDetails');

Route::get('products/{product}/show',[App\Http\Controllers\ProductsController::class,'details']) ->name("products.show");
Route::get('products/{product}/shopingcar',[App\Http\Controllers\ProductsController::class,'shopingcar']) ->name("products.shopingcar");
Route::get('products/clearcar',[App\Http\Controllers\ProductsController::class,'clearcar']) ->name("products.clearcar");
Route::get('products/{product}/clearProduct',[App\Http\Controllers\ProductsController::class,'clearProduct']) ->name("products.clearProduct");

//RUTAS TEMPORADAS

Route::resource('season', SeasonsController::class)->names('seasons');
Route::get('seasons/{id}/disable', [App\Http\Controllers\SeasonsController::class, 'disableSeasons'])->name('seasons.disableSeasons');
Route::get('seasons/{id}/active', [App\Http\Controllers\SeasonsController::class, 'activeSeasons'])->name('seasons.activeSeasons');
Route::get('services/{services}/seasonDetails',[App\Http\Controllers\ServicesController::class,'seasonDetails']) ->name("services.seasonDetails");


?>
