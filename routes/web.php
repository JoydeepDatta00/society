<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\events\Eventcontroller;
use App\Http\Controllers\banner\Bannercontroller;
use App\Http\Controllers\member\Membercontroller;
use App\Http\Controllers\gallery\Gallerycontroller;
use App\Http\Controllers\auditorium\Auditoriumcontroller;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully!';
});

Route::get('/admin/dashboard', function () {
    return view('admin.admin_index');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth'])->group(function () {

    Route::controller(Admincontroller::class)->group(function () {
        Route::get('/admin/logout', 'logout')->name('admin.logout');
        Route::get('/admin/edit/profile', 'edit')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    });
});
Route::middleware(['auth'])->group(function () {
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
    });
});
Route::middleware(['auth'])->group(function () {
    Route::controller(Gallerycontroller::class)->group(function () {
        Route::get('/admin/thumbnail', 'Thumbnails')->name('admin.thumbnail');
        Route::post('/admin/add-thumbnail', 'createThumbnails')->name('admin.addthumbnail');
        Route::get('/admin/edit_thumbnail/{thumbnail_id}', 'editThumbnails');
        Route::post('/admin/update-thumbnail', 'updateThumbnail')->name('admin.updatethumbnail');
        Route::get('/admin/delete-thumbnail/{thumbnail_id}', 'deleteThumbnail');
        //gallery images
        Route::get('/admin/gallery-images/{thumbnail_id}', 'addGalleryImage')->name('admin.gallery');
        Route::post('/admin/store-gallery', 'addGalleryImagesArray')->name('admin.galleryimages');
        Route::get('/admin/delete-gallery/{gallery_id}', 'deleteGallery');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(Auditoriumcontroller::class)->group(function () {
        Route::get('/admin/auditorium', 'auditorium')->name('admin.auditorium');
        Route::post('/admin/add-auditorium', 'addAuditorium')->name('admin.addauditorium');
        Route::get('/admin/edit-auditoirum/{auditorium_id}', 'editAuditoium');
        Route::post('/admin/update-auditorium', 'updateAuditorium')->name('admin.updateAuditorium');
        Route::get('/admin/delete-auditorium/{auditorium_id}', 'deleteAuditorium');
        //====auditorium services
        Route::get('/admin/create-auditorium-services', 'auditoriumServices');
        Route::post('/admin/add-auditorium-services', 'createAuditoriumServices')->name('admin.createauditorium');
        Route::get('/admin/delete-services/{id}', 'deleteAuditouriumServices');
        //=======auditorium slots==========
        Route::get('/admin/auditorium-slots', 'auditoriumSlots');
        Route::post('/admin/create-slots', 'createAuditoriumSlots')->name('admin.createslots');
        Route::get('/admin/delete-slots/{id}', 'deleteSlots');
        //auditorium hall ===
        Route::get('/admin/auditotium-hall', 'auditoriumHall');
        Route::post('/admin/store-auditotium-hall', 'storeAuditoriumHall')->name('admin.storeAuditoriumHall');
        Route::get('/admin/delete-halls/{id}', 'deleteHalls');

        Route::get('/get-halls/{auditoriumId}', 'getHalls');
        //========
        Route::get('/admin/feedbacks', 'getFeedbacks');
        Route::get('/admin/registrations', 'getRegistrations');
    });
});
//============members section===========
Route::middleware(['auth'])->group(function () {
    Route::controller(Membercontroller::class)->group(function () {
        Route::get('/admin/members', function () {
            return view('admin.members.members');
        });
        Route::post('/admin/add-member', 'storeMemberData')->name('admin.addmember');
        Route::get('/admin/edit-members/{id}', 'editMemberData');
        Route::post('/admin/update-member', 'updateMemberData')->name('admin.updatemember');
    });
});
Route::middleware(['auth'])->group(
    function () {
        Route::controller(Bannercontroller::class)->group(
            function () {
                Route::get('/admin/banners', function () {
                    return view('admin.banner.banners');
                });
                Route::post('/admin/banner', 'storeBannerImages')->name('admin.storebanner');
            }
        );
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
