<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CheckUpdateController;
use App\Http\Controllers\Customer\AuthController as CustomerAuthController;
use App\Http\Controllers\Customer\VehicleController as CustomerVehicleController;
use App\Http\Controllers\Customer\ProfileController as CustomerProfileController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\Station\AuthController as StationAuthController;
use App\Http\Controllers\VehicleController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function() {
    return redirect('https://getmontir.com');
})->name('index');

Route::middleware('role')->group(function() {

    Route::middleware('platform:web,android')->group(function() {
        /**
         * REGION
         */
        Route::get('provinces', [ RegionController::class, 'provinces' ])->name('province.index');
        Route::get('cities', [ RegionController::class, 'cities' ])->name('city.index');
        Route::get('districts', [ RegionController::class, 'districts' ])->name('district.index');
        Route::post('province/cities', [ RegionController::class, 'citiesByProvince' ])->name('province.cities');
        Route::post('city/districts', [ RegionController::class, 'districtsByCity' ])->name('city.districts');

        /**
         * VEHICLE
         */
        Route::get('vehicle-brands', [ VehicleController::class, 'brands' ])->name('vehicle.brand.index');
        Route::get('vehicle-types', [ VehicleController::class, 'types' ])->name('vehicle.type.index');
        Route::get('vehicle-transmissions', [ VehicleController::class, 'transmissions' ])->name('vehicle.transmission.index');
        Route::post('vehicle-brand/types', [ VehicleController::class, 'typesByBrand' ])->name('vehicle.brand.types');
        Route::post('vehicle-type/transmissions', [ VehicleController::class, 'transmissionsByType' ])->name('vehicle.type.tranmissions');
        Route::post('vehicle-transmission/years', [ VehicleController::class, 'yearsByTransmission' ])->name('vehicle.transmission.years');

        /**
         * SERVICES
         */
        Route::get('service/tuneups', [ ServiceController::class, 'tuneups' ])->name('service.tuneup');
        Route::get('service/categories', [ ServiceController::class, 'categories' ])->name('service.category');
        Route::get('service/packages', [ ServiceController::class, 'packages' ])->name('service.package');
        Route::post('service/category/list-services', [ ServiceController::class, 'servicesByCategory' ])->name('service.index');
        Route::post('service/package/detail', [ ServiceController::class, 'detailPackage' ])->name('service.package.show');
        Route::post('service/detail', [ ServiceController::class, 'detail' ])->name('service.show');
        Route::post('service/detail/spareparts', [ ServiceController::class, 'detailSpareparts' ])->name('service.sparepart');

        /**
         * SPARE PARTS
         */
        Route::get('sparepart/categories', [ SparepartController::class, 'categories' ])->name('sparepart.categories');
        Route::get('spareparts', [ SparepartController::class, 'index' ])->name('sparepart.index');
        Route::post('sparepart/category/list-spareparts', [ SparepartController::class, 'sparepartsByCategory' ])->name('sparepart.category.index');
        Route::post('sparepart/detail', [ SparepartController::class, 'detail' ])->name('sparepart.show');

        /**
         * EMERGENCY CALL
         */
        Route::get('emergencies', [ EmergencyController::class, 'index' ])->name('emergency.index');
    });

    Route::middleware('platform:android')->post('check-update/customer', [ CheckUpdateController::class, 'customer' ])->name('check.update');
    Route::middleware('platform:android')->post('check-update/station', [ CheckUpdateController::class, 'station' ])->name('check.update');

});

Route::middleware('platform:android')->group(function() {

    /**
     * CUSTOMER
     */
    Route::middleware('role:customer')->namespace('Customer')->name('customer.')->prefix('customer')->group(function() {    
        /**
         * AUTH
         */
        Route::post('auth', [ CustomerAuthController::class, 'auth' ])->name('auth.login');
        Route::post('auth/social', [ CustomerAuthController::class, 'loginSocial' ])->name('auth.login.social');
        Route::post('register', [ CustomerAuthController::class, 'register' ])->name('auth.register');
        Route::post('register/social', [ CustomerAuthController::class, 'registerSocial' ])->name('auth.register.social');
        Route::post('password/forgot', [ CustomerAuthController::class, 'forgotPassword' ])->name('auth.password.forgot');
        Route::post('password/forgot/confirm', [ CustomerAuthController::class, 'confirmResetPassword' ])->name('auth.password.forgot.confirm');
        Route::post('password/change', [ CustomerAuthController::class, 'resetPassword' ])->name('auth.password.change');
    
    });

    /**
     * STATION
     */
    Route::middleware('role:station')->name('station.')->prefix('station')->group(function() {
        /**
         * AUTH
         */
        Route::post('auth', [ StationAuthController::class, 'auth'])->name('auth.login');
        Route::post('auth/social', [ StationAuthController::class, 'authSocial'])->name('auth.login.social');
        Route::post('password/forgot', [ StationAuthController::class, 'forgotPassword' ])->name('auth.password.forgot');
        Route::post('password/forgot/confirm', [ StationAuthController::class, 'confirmResetPassword' ])->name('auth.password.forgot.confirm');
        Route::post('password/change', [ StationAuthController::class, 'resetPassword' ])->name('auth.password.change');
    });

});

Route::middleware('auth:sanctum')->group(function() {

    Route::middleware('platform:android')->group(function() {

        /**
         * NOTIFICATION
         */
        Route::get('notifications/check', [ NotificationController::class, 'check' ])->name('notification.check');
        Route::post('notifications', [ NotificationController::class, 'all' ])->name('notification.index');

        /**
         * ALERT
         */
        Route::get('alerts', [ AnnouncementController::class, 'index' ])->name('alert.index');

        /**
         * BANNER
         */
        Route::post('banners', [ BannerController::class, 'index' ])->name('banner.index');

        /**
         * PROFILE
         */
        Route::post('profile', [ ProfileController::class, 'profile' ])->name('profile.user');

        /**
         * ===========
         * CUSTOMER
         * ===========
         */
        Route::middleware('role:customer')->namespace('Customer')->name('customer.')->prefix('customer')->group(function() {

            /**
             * VEHICLE
             */
            Route::get('vehicles', [ CustomerVehicleController::class, 'index' ])->name('vehicle.index');
            Route::get('vehicle/{id}', [ CustomerVehicleController::class, 'show'])->name('vehicle.show');
            Route::post('vehicle', [ CustomerVehicleController::class, 'store' ])->name('vehicle.create');
            Route::put('vehicle/{id}', [ CustomerVehicleController::class, 'update'])->name('vehicle.edit');
            Route::delete('vehicle', [ CustomerVehicleController::class, 'delete'])->name('vehicle.delete');
            Route::post('vehicle/default', [ CustomerVehicleController::class, 'setDefault' ])->name('vehicle.default');

            /**
             * CHECK AVAILABILITY
             */
            Route::post('available/services', function() {})->name('available.services');
            Route::post('available/spareparts', function() {})->name('available.spareparts');
            Route::post('available/emergencies', function() {})->name('available.emergency');

            /**
             * HISTORY ORDER
             */
            Route::get('histories', function() {})->name('history.index');
            Route::get('history/active', function() {})->name('history.active');
            Route::post('order/detail', function() {})->name('order.show');

            /**
             * PROCESS ORDER
             */
            Route::post('order/send', function() {})->name('order.send');
            Route::post('order/receive', function() {})->name('order.receive');
            Route::post('order/cancel', function() {})->name('order.cancel');
            Route::post('order/rate', function() {})->name('order.rate');

            /**
             * PROFILE
             */
            Route::get('user', [ CustomerProfileController::class, 'user' ])->name('profile.show');
            Route::post('verify-email', [ CustomerProfileController::class, 'verify' ])->name('profile.verify.email');
            Route::post('information', [ CustomerProfileController::class, 'update' ])->name('profile.edit');
            Route::post('change-password', [ CustomerProfileController::class, 'password' ])->name('profile.change.password');

            /**
             * Q&A
             */
            Route::post('feedback', function() {})->name('feedback.create');
        });

        /**
         * ==================
         * STATION
         * ==================
         */
        Route::middleware('role:station')->name('station.')->prefix('station')->group(function() {

            /**
             * MECHANIC
             */
            Route::get('mechanics', function() {})->name('mechanic.index');
            Route::get('mechanic/{id}', function() {})->name('mechanic.show');
            Route::post('mechanic', function() {})->name('mechanic.create');
            Route::put('mechanic/{id}', function() {})->name('mechanic.edit');
            Route::delete('mechanic', function() {})->name('mechanic.delete');
            Route::post('mechanic/status', function() {})->name('mechanic.status');
            Route::get('mechanic/{id}/services', function() {})->name('mechanic.services.index');
            Route::get('mechanic/{id}/spareparts', function() {})->name('mechanic.spareparts.index');
            Route::get('mechanic/{id}/emergencies', function() {})->name('mechanic.emergencies.index');
            Route::post('mechanic/{id}/services', function() {})->name('mechanic.services.edit');
            Route::post('mechanic/{id}/spareparts', function() {})->name('mechanic.spareparts.edit');
            Route::post('mechanic/{id}/emergencies', function() {})->name('mechanic.emergencies.edit');

            /**
             * SERVICES
             */
            Route::get('services', function() {})->name('service.index');
            Route::post('services', function() {})->name('service.edit');

            /**
             * SPARE PARTS
             */
            Route::get('spareparts', function() {})->name('sparepart.index');
            Route::post('spareparts', function() {})->name('sparepart.edit');

            /**
             * EMERGENCY
             */
            Route::get('emergecies', function() {})->name('emergency.index');
            Route::post('emergencies', function() {})->name('emergency.edit');

            /**
             * HISTORY ORDER
             */
            Route::get('histories', function() {})->name('history.index');
            Route::get('history/active', function() {})->name('history.active');
            Route::post('order/detail', function() {})->name('order.show');

            /**
             * PROCESSING ORDER
             */
            Route::post('order/send', function() {})->name('order.send');
            Route::post('order/receive', function() {})->name('order.receive');
            Route::post('order/reject', function() {})->name('order.reject');
            Route::post('order/cancel', function() {})->name('order.cancel');
            Route::post('order/rate', function() {})->name('order.rate');

            /**
             * REVENEU
             */
            Route::post('finances', function() {})->name('finance.index');
            Route::post('finance/incomes', function() {})->name('finance.income');
            Route::post('finance/cost', function() {})->name('finance.cost');
            Route::post('finance/montir', function() {})->name('finance.montir');

            /**
             * PROFILE
             */
            Route::get('user', function() {})->name('profile.show');
            Route::post('verify-email', function() {})->name('profile.verify.email');
            Route::post('information', function() {})->name('profile.edit');
            Route::post('change-password', function() {})->name('profile.change.password');
            Route::get('galleries', function() {})->name('profile.gallery.index');
            Route::post('gallery/image', function() {})->name('profile.gallery.create');
            Route::post('galleries', function() {})->name('profile.gallery.edit');
            Route::delete('gallery/image', function() {})->name('profile.gallery.delete');
            Route::get('documents', function() {})->name('profile.document.index');
            Route::post('document/owner-identity', function() {})->name('profile.document.owner-identity.edit');
            Route::delete('document/owner-identity', function() {})->name('profile.document.owner-identity.delete');
            Route::post('document/station-image', function() {})->name('profile.document.station-image.edit');
            Route::delete('document/station-image', function() {})->name('profile.document.station-image.delete');
            Route::post('document/pbb', function() {})->name('profile.document.pbb.edit');
            Route::delete('document/pbb', function() {})->name('profile.document.pbb.delete');
            Route::post('document/skrk', function() {})->name('profile.document.skrk.edit');
            Route::delete('document/skrk', function() {})->name('profile.document.skrk.delete');

            /**
             * Q&A
             */
            Route::post('feedback', function() {})->name('feedback.create');
        });

        /**
         * ==================
         * MECHANIC
         * ==================
         */
        Route::middleware('role:mechanic')->name('mechanic.')->prefix('mechanic')->group(function() {

            /**
             * AUTH
             */
            Route::post('auth', function() {})->name('auth.login');
            Route::post('auth/social', function() {})->name('auth.login.social');
            Route::post('register', function() {})->name('auth.register');
            Route::post('register/social', function() {})->name('auth.register.social');
            Route::post('password/forgot', function() {})->name('auth.password.forgot');
            Route::post('password/forgot/confirm', function() {})->name('auth.password.forgot.confirm');
            Route::post('password/change', function() {})->name('auth.password.change');

            /**
             * SERVICES
             */
            Route::get('services', function() {})->name('service.index');
            Route::post('services', function() {})->name('service.edit');

            /**
             * SPARE PARTS
             */
            Route::get('spareparts', function() {})->name('sparepart.index');
            Route::post('spareparts', function() {})->name('sparepart.edit');

            /**
             * EMERGENCY
             */
            Route::get('emergecies', function() {})->name('emergency.index');
            Route::post('emergencies', function() {})->name('emergency.edit');

            /**
             * HISTORY ORDER
             */
            Route::get('histories', function() {})->name('history.index');
            Route::get('history/active', function() {})->name('history.active');
            Route::post('order/detail', function() {})->name('order.show');

            /**
             * PROCESSING ORDER
             */
            Route::post('order/send', function() {})->name('order.send');
            Route::post('order/receive', function() {})->name('order.receive');
            Route::post('order/reject', function() {})->name('order.reject');
            Route::post('order/cancel', function() {})->name('order.cancel');
            Route::post('order/rate', function() {})->name('order.rate');

            /**
             * REVENEU
             */
            Route::post('finances', function() {})->name('finance.index');
            Route::post('finance/incomes', function() {})->name('finance.income');
            Route::post('finance/cost', function() {})->name('finance.cost');
            Route::post('finance/montir', function() {})->name('finance.montir');

            /**
             * PROFILE
             */
            Route::get('user', function() {})->name('profile.show');
            Route::post('verify-email', function() {})->name('profile.verify.email');
            Route::post('information', function() {})->name('profile.edit');
            Route::post('change-password', function() {})->name('profile.change.password');

            /**
             * Q&A
             */
            Route::post('feedback', function() {})->name('feedback.create');

        });

    });

});