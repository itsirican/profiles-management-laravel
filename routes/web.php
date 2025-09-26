<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/profiles', [ProfileController::class, "index"])->name('profiles.index');
Route::get('/profiles/create', [ProfileController::class, "create"])->name('profile.create');
Route::get('/profiles/{profile}', [ProfileController::class, "show"])
->where('profile', '\d+')
->name('profile.show');
Route::post('/profiles/store', [ProfileController::class, "store"])->name('profile.store');
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