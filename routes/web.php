<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\events\Eventcontroller;
use App\Http\Controllers\banner\Bannercontroller;
use App\Http\Controllers\member\Membercontroller;
use App\Http\Controllers\gallery\Gallerycontroller;
use App\Http\Controllers\auditorium\Auditoriumcontroller;
use App\Http\Controllers\Chairmancontroller;

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully!';
});

Route::get('/chairman/dashboard', function () {
    return view('admin.admin_index');
})->middleware(['auth', 'verified', 'isChairman'])->name('chairman.dashboard');


Route::middleware(['auth', 'isChairman'])->group(function () {

    Route::controller(Admincontroller::class)->group(function () {
        // Route::get('/chairman/logout', 'logout')->name('admin.logout');
        Route::get('/chairman/edit/profile', 'edit')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        // Route::get('/chairman/view-manager', 'viewManager');
        Route::get('/create-manager', function () {
            return view('admin.createmanager.create_manager');
        });
        Route::post('/store-manager', 'createManager')->name('store.manager');
    });
});
Route::middleware(['auth'])->group(
    function () {
        Route::get('/logout', [Admincontroller::class, 'logout'])->name('admin.logout');
    }
);

//=========EVENT SECTION============
Route::middleware(['auth', 'isChairman'])->group(function () {
    Route::controller(Eventcontroller::class)->group(function () {
        Route::get('/admin/create-events', 'Events')->name('admin.events');
        Route::post('/admin/store-events', 'createEvents')->name('admin.storeEvents');
        Route::get('/admin/edit-event/{event_id}', 'editEvents')->name('admin.editEvents');
        Route::post('/admin/update-event', 'updateEvents')->name('admin.updateEvents');
        Route::get('/admin/delete-events/{event_id}', 'deleteEvents');
        //event Gallery
        Route::get('/admin/events-images/{event_id}', 'addEventsImage')->name('admin.addEventsImage');
        Route::post('/admin/add-event-gallery', 'addEventImagesArray')->name('admin.storeEventGallery');
        Route::get('/admin/delete-events-gallery/{event_id}', 'deleteEventsGallery');
        // Route::get('/create-manager', function () {
        //     return view('admin.createmanager.create_manager');
        // });
    });
});

//===========GALLERY SECTION==========
Route::middleware(['auth', 'isChairman'])->group(function () {
    Route::controller(Gallerycontroller::class)->group(function () {
        Route::get('/chairman/thumbnail', 'Thumbnails')->name('admin.thumbnail');
        Route::post('/chairman/add-thumbnail', 'createThumbnails')->name('admin.addthumbnail');
        Route::get('/chairman/edit_thumbnail/{thumbnail_id}', 'editThumbnails');
        Route::post('/chairman/update-thumbnail', 'updateThumbnail')->name('admin.updatethumbnail');
        Route::get('/chairmann/delete-thumbnail/{thumbnail_id}', 'deleteThumbnail');
        //gallery images
        Route::get('/chairman/gallery-images/{thumbnail_id}', 'addGalleryImage')->name('admin.gallery');
        Route::post('/chairman/store-gallery', 'addGalleryImagesArray')->name('admin.galleryimages');
        Route::get('/chairman/delete-gallery/{gallery_id}', 'deleteGallery');
    });
});
//========auditorium section==========

Route::middleware(['auth', 'isChairman'])->group(function () {
    Route::controller(Chairmancontroller::class)->group(function () {
        Route::get('/chairman/auditorium', 'auditorium')->name('admin.auditorium');
        Route::post('/chairman/add-auditorium', 'addAuditorium')->name('admin.addauditorium');
        Route::get('/chairman/edit-auditoirum/{auditorium_id}', 'editAuditoium');
        Route::post('/chairman/update-auditorium', 'updateAuditorium')->name('admin.updateAuditorium');
        Route::get('/chairman/delete-auditorium/{auditorium_id}', 'deleteAuditorium');

        Route::get('/delete-services/{id}', 'deleteAuditouriumServices');
        Route::get('/delete-slots/{id}', 'deleteSlots');
        Route::get('/delete-halls/{id}', 'deleteHalls');
        //====auditorium services

        //========registration=========
        Route::get('/chairman/feedbacks', 'getFeedbacks');
        Route::get('/chairman/registrations', 'getRegistrations');
        Route::get('/chairman/full-registrations', function () {
            return view('admin.registrations.full-registrations');
        });
        // Route::get('/chairman/full-registrations/{registration_id}', 'getRegistrationsDetails');
        // Route::post('/update/booking-status', 'updateBookingStatus');
        Route::get('/chairman/registrations', 'getChairmanRegistration');
        Route::get('/chairman/full-registrations/{registration_id}', 'getChairmanRegistrationsDetails');
        //=========Add promotion in banner=====
        Route::get('/chairman/add-promotion', 'bannerPromotion');
        Route::post('/chairman/store-Promotion', 'storeBannerPromotion')->name('chairman.storepromotion');
        Route::get('/delete-promotions/{prmotion_id}', 'deleteBannerPromotion');
    });
});
//============members section===========
Route::middleware(['auth', 'isChairman'])->group(function () {
    Route::controller(Membercontroller::class)->group(function () {
        Route::get('/chairman/members', function () {
            return view('admin.members.members');
        });
        Route::post('/chairman/add-member', 'storeMemberData')->name('admin.addmember');
        Route::get('/chairman/edit-members/{id}', 'editMemberData');
        Route::post('/chairman/update-member', 'updateMemberData')->name('admin.updatemember');
    });
});
/////banner section========
Route::middleware(['auth', 'isChairman'])->group(
    function () {
        Route::controller(Bannercontroller::class)->group(
            function () {
                Route::get('/chairman/banners', function () {
                    return view('admin.banner.banners');
                });
                Route::post('/chairman/banner', 'storeBannerImages')->name('admin.storebanner');
            }
        );
    }
);
//

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
require __DIR__ . '/manager.php';
require __DIR__ . '/bookingsuser.php';
