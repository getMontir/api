<?php

namespace App\Providers;

use App\Repository\CityRepositoryInterface;
use App\Repository\DistrictRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\CityRepository;
use App\Repository\Eloquent\DistrictRepository;
use App\Repository\Eloquent\ProvinceRepository;
use App\Repository\Eloquent\ServiceCategoryRepository;
use App\Repository\Eloquent\ServiceRepository;
use App\Repository\Eloquent\SparepartCategoryRepository;
use App\Repository\Eloquent\SparepartRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\VehicleBrandRepository;
use App\Repository\Eloquent\VehicleTransmissionRepository;
use App\Repository\Eloquent\VehicleTypeRepository;
use App\Repository\Eloquent\VehicleYearRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\ProvinceRepositoryInterface;
use App\Repository\ServiceCategoryRepoInterface;
use App\Repository\ServiceRepoInterface;
use App\Repository\SparepartCategoryRepoInterface;
use App\Repository\SparepartRepoInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\VehicleBrandRepoInterface;
use App\Repository\VehicleTransmissionRepoInterface;
use App\Repository\VehicleTypeRepoInterface;
use App\Repository\VehicleYearRepoInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( EloquentRepositoryInterface::class, BaseRepository::class );
        $this->app->bind( UserRepositoryInterface::class, UserRepository::class );

        // REGION
        $this->app->bind( ProvinceRepositoryInterface::class, ProvinceRepository::class );
        $this->app->bind( CityRepositoryInterface::class, CityRepository::class );
        $this->app->bind( DistrictRepositoryInterface::class, DistrictRepository::class );

        // VEHICLE
        $this->app->bind( VehicleBrandRepoInterface::class, VehicleBrandRepository::class );
        $this->app->bind( VehicleTypeRepoInterface::class, VehicleTypeRepository::class );
        $this->app->bind( VehicleTransmissionRepoInterface::class, VehicleTransmissionRepository::class );
        $this->app->bind( VehicleYearRepoInterface::class, VehicleYearRepository::class );

        // SERVICES
        $this->app->bind( ServiceRepoInterface::class, ServiceRepository::class );
        $this->app->bind( ServiceCategoryRepoInterface::class, ServiceCategoryRepository::class );

        // SPARE PARTS
        $this->app->bind( SparepartRepoInterface::class, SparepartRepository::class );
        $this->app->bind( SparepartCategoryRepoInterface::class, SparepartCategoryRepository::class );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
