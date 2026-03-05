<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Post\PostController;

Route::controller(AuthController::class)->group(function () {
    Route::get("/", "show_auth")->name("auth");
    Route::post("/login", "login")->name("login");
    Route::post("/register", "register")->name("register");

    Route::middleware("auth")->group(function () {
        Route::post("/logout", "logout")->name("logout");
    });
});

Route::controller(PostController::class)
    ->prefix("posts")
    ->name("posts.")
    ->middleware("auth")
    ->group(function () {
        Route::get("/", "index")->name("index");
        Route::get("profile", "profile")->name("profile");
        Route::post("store", "store")->name("store");
    });
