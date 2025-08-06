<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

route::get("/", [AdminController::class,"home"]);



route::get('/home',[AdminController::class,'index'])->name('home');

route::get("/create_room", [AdminController::class,"create_room"])->name('create_room');

route::post("/add_room", [AdminController::class,"add_room"])->name('add_room');

route::get("/display_room", [AdminController::class,"display_room"])->name('display_room');