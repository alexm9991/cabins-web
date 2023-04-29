<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//RUTAS USUARIOS - CAMBIO DE CONTRASEÑA

Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/delete', [UserController::class, 'delete'])->name('user.delete');
Route::get('/users/create', [UserController::class, 'showCreate'])->name('users.showCreate');
Route::post('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('change-password', [App\Http\Controllers\ChangePasswordController::class, 'show'])->name('password.change');
Route::post('change-password',[App\Http\Controllers\ChangePasswordController::class, 'update'])->name('password.update');


//RUTAS PRODUCTOS

Route::get('products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products');
Route::get('products/index',[App\Http\Controllers\ProductsController::class,'index']) ->name("products.index");
Route::get('products/create',[App\Http\Controllers\ProductsController::class,'create']) ->name("products.create");
Route::post('products/store',[App\Http\Controllers\ProductsController::class,'store']) ->name("products.store");
Route::get('products/{product}/edit}',[App\Http\Controllers\ProductsController::class,'edit']) ->name("products.edit");
Route::post('/products/{products}', [ProductsController::class, 'update'])->name('products.update');
Route::get('products/{id}/desactivar', [ProductsController::class, 'disableProducts'])->name('products.disableProducts');
Route::get('products/{id}/activar', [ProductsController::class, 'activeProducts'])->name('products.activeProducts');
Route::get('products/{product}/show}',[App\Http\Controllers\ProductsController::class,'details']) ->name("products.show");
Route::get('products/productsviews',[App\Http\Controllers\ProductsController::class,'productsviews']) ->name("products.productsviews");
Route::get('products/{product}/showviews}',[App\Http\Controllers\ProductsController::class,'showviews']) ->name("products.showviews");

//RUTAS PQRS
Route::get('/pqrs', [App\Http\Controllers\PqrsController::class, 'index'])->name('pqrs.index');
Route::get('/pqrs/create', [App\Http\Controllers\PqrsController::class, 'showCreate'])->name('pqrs.showCreate');
Route::get('/pqrs/{pqr}/update', [PqrsController::class, 'view_pqrs'])->name('pqrs.update');
Route::post('/pqrs/create', [PqrsController::class, 'create'])->name('pqrs.create');
Route::put('/pqrs/{id}/delete', [PqrsController::class, 'delete'])->name('pqrs.delete');
Route::put('/pqrs/{id}/update', [PqrsController::class, 'update'])->name('pqrs.update');

// RUTAS SERVICIOS

//Rutas Servicios
Route::get('services', [App\Http\Controllers\ServicesController::class, 'index'])->name('services');
Route::get('services/create', [App\Http\Controllers\ServicesController::class, 'create'])->name('services.create');
Route::post('services/store', [App\Http\Controllers\ServicesController::class, 'store'])->name('services.store');
Route::get('services/home', [App\Http\Controllers\ServicesController::class, 'index'])->name('services');
Route::get('services/{services}/edit}',[App\Http\Controllers\ServicesController::class,'edit']) ->name("services.edit");
Route::get('/services/{services}', [App\Http\Controllers\ServicesController::class, 'update'])->name('services.update');
Route::get('services/{services}/show}',[App\Http\Controllers\ServicesController::class,'show']) ->name("services.show");
Route::get('services/{id}/disable', [App\Http\Controllers\ServicesController::class, 'disableServices'])->name('services.disableServices');
Route::get('services/{id}/active', [App\Http\Controllers\ServicesController::class, 'activeServices'])->name('services.activeServices');

//Rutas de la tabla detalles servicios
Route::get('services/{services}/addDetail}',[App\Http\Controllers\ServicesController::class,'addDetail']) ->name("services.addDetail");
Route::post('services/{services}/createDetail}',[App\Http\Controllers\ServicesController::class,'createDetail']) ->name("services.createDetail")
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

//RUTAS IR A LA TIENDA

Route::post('costumers/home/home')->name('costumers.home.home');

?>
