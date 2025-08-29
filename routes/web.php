<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Auth;

route::get("/", [AdminController::class,"home"]);



route::get('/home',[AdminController::class,'index'])->name('home');

route::get("/create_room", [AdminController::class,"create_room"])->name('create_room');

route::post("/add_room", [AdminController::class,"add_room"])->name('add_room');

route::get("/display_room", [AdminController::class,"display_room"])->name('display_room');

route::get("/delete_room/{id}", [AdminController::class,"delete_room"])->name('delete_room');

route::get("/update_room/{id}", [AdminController::class,"update_room"])->name('update_room');

route::post("/edit_room/{id}", [AdminController::class,"edit_room"])->name('edit_room');

route::get("/room_details/{id}", [HomeController::class,"room_details"])->name('room_details');

route::post("/add_booking/{id}", [HomeController::class,"add_booking"])->name('add_booking');

route::get("/bookings", [AdminController::class,"bookings"])->name('bookings');