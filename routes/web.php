<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Livewire\Counter;
use App\Livewire\NewBooking;
use App\Livewire\NewRoom;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('hotel', function () {
//     return view('hotel');
// })->name('hotel');

Route::get('hotel', [HotelController::class, 'index'])->name('hotel');

Route::get('booking', [BookingController::class, 'index'])->name('booking');

Route::post('booking-store', [BookingController::class, 'store'])->name('booking.store');

Route::get('booking-edit/{id}', [BookingController::class, 'edit'])->name('booking.edit');

Route::put('booking-update/{id}', [BookingController::class, 'update'])->name('booking.update');

Route::get('booking-delete/{id}', [BookingController::class, 'destroy'])->name('booking.delete');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('counter', Counter::class)->name('counter');
    Route::get('new-booking', NewBooking::class)->name('new-booking');
    Route::get('new-room', NewRoom::class)->name('new-room');
});
require __DIR__ . '/auth.php';
