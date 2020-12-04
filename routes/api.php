<?php

use App\Http\Controllers\RegionController;
use Illuminate\Http\Request;
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
});

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
        Route::get('vehicle-brands', function() {})->name('vehicle.brand.index');
        Route::get('vehicle-types', function() {})->name('vehicle.type.index');
        Route::get('vehicle-transmissions', function() {})->name('vehicle.transmission.index');
        Route::post('vehicle-brand/types', function() {})->name('vehicle.brand.types');
        Route::post('vehicle-type/transmissions', function() {})->name('vehicle.type.tranmissions');
        Route::post('vehicle-transmission/years', function() {})->name('vehicle.transmission.years');

        /**
         * SERVICES
         */
        Route::get('service/tune-ups', function() {})->name('service.tuneup');
        Route::get('service/categories', function() {})->name('service.category');
        Route::get('service/packages', function() {})->name('service.package');
        Route::post('service/category/list-services', function() {})->name('service.index');
        Route::post('service/package/detail', function() {})->name('service.package.show');
        Route::post('service/detail', function() {})->name('service.show');
        Route::post('service/detail/spareparts', function() {})->name('service.sparepart');

        /**
         * SPARE PARTS
         */
        Route::get('sparepart/categories', function() {})->name('sparepart.categories');
        Route::get('spareparts', function() {})->name('sparepart.index');
        Route::post('sparepart/category/list-spareparts', function() {})->name('sparepart.category.index');
        Route::post('sparepart/detail', function() {})->name('sparepart.show');

        /**
         * EMERGENCY CALL
         */
        Route::get('emergencies', function() {})->name('emergency.index');
    });

    Route::middleware('platform:android')->get('check-update')->name('check.update');

});

Route::middleware('auth:sanctum')->group(function() {

    Route::middleware('platform:android')->group(function() {

        /**
         * NOTIFICATION
         */
        Route::get('notifications/check', function() {})->name('notification.check');
        Route::post('notifications', function() {})->name('notification.index');

        /**
         * ALERT
         */
        Route::get('alerts', function() {})->name('alert.index');

        /**
         * BANNER
         */
        Route::post('banners', function() {})->name('banner.index');

        /**
         * ===========
         * CUSTOMER
         * ===========
         */
        Route::middleware('role:customer')->name('customer.')->prefix('customer')->group(function() {
            
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
             * VEHICLE
             */
            Route::get('vehicles', function() {})->name('vehicle.index');
            Route::post('vehicle', function() {})->name('vehicle.create');
            Route::put('vehicle/{id}', function() {})->name('vehicle.edit');
            Route::delete('vehicle', function() {})->name('vehicle.delete');
            Route::post('vehicle/default', function() {})->name('vehicle.default');

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
            Route::get('user', function() {})->name('profile.show');
            Route::post('verify-email', function() {})->name('profile.verify.email');
            Route::post('information', function() {})->name('profile.edit');
            Route::post('change-password', function() {})->name('profile.change.password');

            /**
             * Q&A
             */
            Route::post('feedback', function() {})->name('feedback.create');
        });

        /**
         * ==================
         * STATION & MECHANIC
         * ==================
         */
        Route::middleware('role:station,mechanic')->group(function() {
        });

        /**
         * ==================
         * STATION
         * ==================
         */
        Route::middleware('role:station')->name('station.')->prefix('station')->group(function() {

            /**
             * AUTH
             */
            Route::post('auth', function() {})->name('auth.login');
            Route::post('auth/social', function() {})->name('auth.login.social');
            Route::post('password/forgot', function() {})->name('auth.password.forgot');
            Route::post('password/forgot/confirm', function() {})->name('auth.password.forgot.confirm');
            Route::post('password/change', function() {})->name('auth.password.change');

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