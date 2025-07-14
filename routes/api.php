<?php

use Illuminate\Support\Facades\Route;
use Jazer\Rentals\Http\Controllers\Create\RentalPost;
use Jazer\Rentals\Http\Controllers\Update\UpdateRentalPost;
use Jazer\Rentals\Http\Controllers\Update\RentalPostStatus;
use Jazer\Rentals\Http\Controllers\Delete\DeleteRentalPost;
use Jazer\Rentals\Http\Controllers\Fetch\PaginateRentalPost;
use Jazer\Rentals\Http\Controllers\Fetch\SingleRentalPost;
use Jazer\Rentals\Http\Controllers\Create\RentalBooking;
use Jazer\Rentals\Http\Controllers\Update\RentalBookingStatus;
use Jazer\Rentals\Http\Controllers\Delete\DeleteRentalBooking;
use Jazer\Rentals\Http\Controllers\Fetch\PaginateRentalBooking;
use Jazer\Rentals\Http\Controllers\Fetch\SingleRentalBooking;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'rentalsposting'], function () {     
        Route::post('createrentalpost', [RentalPost::class, 'create']);
        Route::post('updaterentalpost', [UpdateRentalPost::class, 'update']);
        Route::post('updaterentalpoststatus', [RentalPostStatus::class, 'updatestatus']);
        Route::post('deleterentalpost', [DeleteRentalPost::class, 'delete']);
        Route::get('fetchpaginaterentalpost', [PaginateRentalPost::class, 'paginate']);
        Route::get('singlerentalpost', [SingleRentalPost::class, 'single']);
    });
    Route::group(['prefix' => 'rentalsbooking'], function () {     
        Route::post('createrentalbooking', [RentalBooking::class, 'create']);
        Route::post('updaterentalbookingstatus', [RentalBookingStatus::class, 'updatestatus']);
        Route::post('deleterentalbooking', [DeleteRentalBooking::class, 'delete']);
        Route::get('fetchpaginaterentalbooking', [PaginateRentalBooking::class, 'paginate']);
        Route::get('singlerentalbooking', [SingleRentalBooking::class, 'single']);
    });
});

