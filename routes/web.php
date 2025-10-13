<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/profiles', [ProfileController::class, "index"])->name('profiles.index');
// Route::get('/profiles/create', [ProfileController::class, "create"])->name('profile.create');
// Route::get('/profiles/{profile}', [ProfileController::class, "show"])
// ->where('profile', '\d+')
// ->name('profile.show');
// Route::post('/profiles/store', [ProfileController::class, "store"])->name('profile.store');

// Route::delete('/profiles/{profile}', [ProfileController::class, "destroy"])
// ->name("profiles.destroy");

// Route::get('/profiles/{profile}/edit', [ProfileController::class, "edit"])
// ->name('profiles.edit');

// Route::put('/profiles/{profile}', [ProfileController::class, "update"])
// ->name('profiles.update');


Route::name('profiles.')->prefix('profiles')->group(function() {
  Route::controller(ProfileController::class)->group(function() {
    Route::get('/', "index")->name('index');
    Route::get('/create', "create")->name('create');
    Route::post('/', "store")->name('store');
    Route::delete('/{profile}', "destroy")->name("destroy");
    Route::get('/{profile}/edit', "edit")->name('edit');
    Route::put('/{profile}', "update")->name('update');
    Route::get('/{profile}', "show")
    ->where('profile', '\d+')
    ->name('show');
  });
});


Route::get('/', [HomeController::class, "index"])->name('home');

Route::get('/login', [LoginController::class, "show"])->name("login.show");
Route::post('/login', [LoginController::class, "login"])->name("login");

Route::get('/logout', [LoginController::class, "logout"])->name("login.logout");




Route::get('/settings', [InformationsController::class, "index"])->name('settings.index');


// Route::get('/{id}', function(Request $request) {
//     // dd($request->id);
//     $title = "Irican";
//     return view("Welcome", [
//         "id" => $request->id,
//         "title" => [
//             "firstName" => "Abdelilah",
//             "aka" => "Irican",
//             "lastName" => "Naciri"
//         ]
//     ]);
// });