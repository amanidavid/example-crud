<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\MyTaskComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('task', function () {
        return view('task');
    })->name('my-task');

    Route::get('supervisor', function () {
        return view('supervisor');
    })->name('create-by-me');

    
    // Route::get('livewire/my-task-component', MyTaskComponent::class);
    Route::get('import-excel', MyTaskComponent::class)->name('import-excel');


});




