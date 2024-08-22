<?php

use App\Http\Controllers\frontend\Homecontroller;
use Illuminate\Support\Facades\Route;


Route::get('/about-us', function () {
    return view('frontend.home.aboutus');
});
Route::get('/thankyou', function () {
    return view('frontend.home.thank-you');
});
Route::get('/feedback', function () {
    return view('frontend.registration.contact_us');
});


// Route::middleware(['auth'])->group(
//     function () {

Route::controller(Homecontroller::class)->group(
    function () {
        Route::get('/members', 'getMemberData');

        //================events=========
        Route::get('/events', 'getEvents');
        Route::get('/events/event-gallery/{id}', 'getEventGallery');
        //==================gallery============
        Route::get('/gallery', 'getGalleryThumbnail');
        Route::get('/gallery/images/{id}', 'getGalleryImages');

        //=============json data fetch===========
        Route::get('/get-auditorium-services/{auditoriumId}', 'getAuditoriumServices');
        Route::get('/get-halls-by-auditorium/{auditoriumId}', 'getHallsByAuditorium');
        Route::get('/get-hall-slots/{hallId}', 'getHallSlots');

        //registration
        Route::get('/book-auditorium', 'bookAuditorium')->name('book.auditorium');
        Route::post('/add/book-auditorium', 'storeAuditoriumBooking')->name('store.booking');
        //==========feedback=====
        Route::post('/store-feedback', 'storeFeedback')->name('store.feedback');
    }
);
//     }
// );
