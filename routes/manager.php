<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Managercontroller;
use App\Http\Controllers\auditorium\Auditoriumcontroller;


Route::get('/manager/dashboard', function () {
    return view('manager.manager_index');
})->middleware(['auth', 'verified'])->name('manager.dashboard');

Route::middleware(['auth', 'isManager'])->group(function () {
    Route::controller(Managercontroller::class)->group(function () {
        //auditorium data====
        Route::get('/manager/create-auditorium-services', 'auditoriumServices');
        Route::post('/manager/add-auditorium-services', 'createAuditoriumServices')->name('admin.createauditorium');
      
        //=======auditorium slots==========
        Route::get('/manager/auditorium-slots', 'auditoriumSlots');
        Route::post('/manager/create-slots', 'createAuditoriumSlots')->name('admin.createslots');
       
        //auditorium hall ===
        Route::get('/manager/auditotium-hall', 'auditoriumHall');
        Route::post('/manager/store-auditotium-hall', 'storeAuditoriumHall')->name('admin.storeAuditoriumHall');
       
        Route::get('/get-halls/{auditoriumId}', 'getHalls');
        Route::get('/manager/registrations', 'getRegistrations');
        Route::get('/manager/full-registrations/{registration_id}', 'getRegistrationsDetails');
        Route::post('/update/booking-status', 'updateBookingStatus');
    });
});
