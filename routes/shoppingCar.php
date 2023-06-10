<?php

use App\Http\Controllers\ShoppingCarController;
use Illuminate\Support\Facades\Route;

Route::get('shoppingCar',[shoppingCarController::class,'index']) ->name("shoppingCar.index");
Route::get('shopingCar/delete',[ShopingCarController::class,'delete']) ->name("shopingCar.delete");
Route::get('shoppingCar/{id}/edit/{cantidad}',[shoppingCarController::class, 'edit'])->name('shoppingCar.edit');
Route::get('shoppingCar/{product}/create',[shoppingCarController::class,'create']) ->name("shoppingCar.create");
Route::get('shoppingCar/{product}/clearProduct',[shoppingCarController::class,'clearProduct']) ->name("shoppingCar.clearProduct");
