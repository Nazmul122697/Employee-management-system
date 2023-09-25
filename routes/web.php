<?php

use App\Livewire\Backend\DashboardIndex;
use App\Livewire\DistrictIndex;
use App\Livewire\DivisionIndex;
use App\Livewire\HouseUserIndex;
use App\Livewire\RoomIndex;
use App\Livewire\StateIndex;
use App\Livewire\UserCreateIndex;
use Illuminate\Support\Facades\Route;

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
    return view('frontend.main');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // backend part 
    Route::get('/dashboard',DashboardIndex::class)->name('dashboard');    
    Route::get('/shipping/division',DivisionIndex::class)->name('shipping-division');    
    Route::get('/shipping/state',StateIndex::class)->name('shipping-state');    
    Route::get('/shipping/district',DistrictIndex::class)->name('shipping-district');    
    Route::get('/housing-management/rooms',RoomIndex::class)->name('housing-management.rooms');    
    Route::get('/housing-management/users',HouseUserIndex::class)->name('housing-management.users');    
    Route::get('/housing-management/create-users',UserCreateIndex::class)->name('housing-management.create-users');    
});
