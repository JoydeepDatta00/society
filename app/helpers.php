<?php

use App\Models\Banners;
use App\Models\Members;
use App\Models\Auditorium;
use App\Models\AuditoriumHall;
use App\Models\Auditoriumservices;
use App\Models\Slots;
use App\Models\Thumbnail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

///////==============encryption========
if (!function_exists('encryptId')) {
    function encryptId($string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'SecreT1234';
        $secret_iv = 'IV1234';
        // hash
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
}

if (!function_exists('decryptId')) {
    function decryptId($string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'SecreT1234';
        $secret_iv = 'IV1234';
        // hash
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }
}

//==========
if (!function_exists('getHallsByAuditoriumId')) {
    function getHallsByAuditoriumId($auditoriumId)
    {
        $getHalls = AuditoriumHall::where('auditorium_id', $auditoriumId)->get();
        if ($getHalls) {
            return $getHalls;
        }
        return null;
    }
}


if (!function_exists('getByAuditoriumName')) {
    function getByAuditoriumName($auditoriumId)
    {
        $auditorium = Auditorium::where('id', $auditoriumId)->first();
        if ($auditorium) {
            return $auditorium->name;
        }
        return null;
    }
}
if (!function_exists('getAuditoriumService')) {
    function getAuditoriumService($auditoriumId)
    {
        return Auditoriumservices::where('auditorium_id', $auditoriumId)->get();
    }
}
if (!function_exists('getHallsByAuditoriumSlots')) {
    function getHallsByAuditoriumSlots($hallid)
    {
        return Slots::where('hall_id', $hallid)->get();
    }
}
if (!function_exists('getHallsName')) {
    function getHallsName($hallid)
    {
        // Fetch a single auditorium hall by ID
        $auditorium = Auditoriumhall::where('id', $hallid)->first();

        // Check if the record is found and return the hall name
        if ($auditorium) {
            return $auditorium->auditorium_hall_name;
        }

        // Return a default value or an empty string if not found
        return 'Hall not found';
    }
}

if (!function_exists('getMemberData')) {
    function getMemberData()
    {
        $memberData = Members::all();
        return $memberData;
    }
}
if (!function_exists('getBannerImages')) {
    function getBannerImages()
    {
        $bannerImages = Banners::all();
        return
            $bannerImages;
    }
}
if (!function_exists('getAuditoriumData')) {
    function getAuditoriumData()
    {
        $auditoriumData = Auditorium::all();
        return
            $auditoriumData;
    }
}
if (!function_exists('getGalleryImages')) {
    function getGalleryImages()
    {
        $galleryImages = Thumbnail::all();
        return
            $galleryImages;
    }
}
