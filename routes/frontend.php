<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\frontend\Homecontroller;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'isUser'])->group(
    function () {

        Route::controller(Homecontroller::class)->group(
            function () {
                Route::get('/full_booking_history', function () {
                    return view('frontend.loginRegistration.full_booking_history');
                });
                Route::get('/userprofile', [Homecontroller::class, 'userProfile'])->name('user.profile');
                // return view('frontend.loginregistration.userprofile');

                Route::get('/book-auditorium', 'bookAuditorium')->name('book.auditorium');
                Route::post('/add/book-auditorium', 'storeAuditoriumBooking')->name('store.booking');
                Route::get('/get/booking-details/{id}', 'getViewBookings');
                Route::post('/store/promotion-link', 'storePromotionLink')->name('store.promotionLink');
                Route::post('/store/promotion-image', 'storePromotionImage')->name('store.promotionImage');
                Route::post('/update-url', 'updateWebcastingUrl')->name('update.webcastingurl');
            }
        );
    }
);
Route::post('/store/user', [Admincontroller::class, 'createUser'])->name('user.registration');
Route::get('/about-us', function () {
    return view('frontend.home.aboutus');
});
Route::get('/thankyou', function () {
    return view('frontend.home.thank-you');
});
Route::get('/feedback', function () {
    return view('frontend.registration.contact_us');
});
Route::get('/services', function () {
    return view('frontend.home.services');
});
Route::get('/userlogin', function () {
    return view('frontend.loginRegistration.userlogin');
});
Route::get('/user-registration', function () {
    return view('frontend.loginRegistration.userregistration');
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
        // Route::get('/book-auditorium', 'bookAuditorium')->name('book.auditorium');
        // Route::post('/add/book-auditorium', 'storeAuditoriumBooking')->name('store.booking');
        //==========feedback=====
        Route::post('/store-feedback', 'storeFeedback')->name('store.feedback');
    }
);
//     }
// );
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/manager', function () {
        return view('admin.auditorium.manager');
    });
});
