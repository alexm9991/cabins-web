<?php

use App\Http\Controllers\ShoppingCarController;
use Illuminate\Support\Facades\Route;

Route::get('shoppingCar',[shoppingCarController::class,'index']) ->name("shoppingCar.index");
Route::get('shoppingCar/delete',[shoppingCarController::class,'delete']) ->name("shoppingCar.delete");
Route::get('shoppingCar/{id}/edit/{cantidad}',[shoppingCarController::class, 'edit'])->name('shoppingCar.edit');
// Route::get('shoppingCar/{id}/update/{cantidad}',[shoppingCarController::class, 'update'])->name('shoppingCar.update');
Route::get('shoppingCar/{product}/create',[shoppingCarController::class,'create']) ->name("shoppingCar.create");
Route::get('shoppingCar/{product}/clearProduct',[shoppingCarController::class,'clearProduct']) ->name("shoppingCar.clearProduct");
// Route::get('shoppingCar/showcar',[shoppingCarController::class, 'showcar'])->name('shoppingCar.showcar');
// Route::get('shoppingCar/productDetails',[shoppingCarController::class, 'productDetails'])->name('shoppingCar.productDetails');
// Route::get('shoppingCar/{product}/show',[shoppingCarController::class,'details']) ->name("shoppingCar.show");
