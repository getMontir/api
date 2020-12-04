<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call( UserSeeder::class );
        $this->call( ProvinceSeeder::class );
        $this->call( CitySeeder::class );
        $this->call( DistrictSeeder::class );
        $this->call( RoleSeeder::class );
        $this->call( CategorySeeder::class );
        $this->call( DeveloperSeeder::class );
        $this->call( EmergencySeeder::class );
        $this->call( SettingSeeder::class );
        $this->call( SparePartBrandSeeder::class );
        $this->call( SparepartSeeder::class );
        $this->call( StationDetailSeeder::class );
        $this->call( StationDocumentSeeder::class );
        $this->call( StationOwnerSeeder::class );
        $this->call( VehicleBrandSeeder::class );
        $this->call( VehicleClassSeeder::class );
        $this->call( VehicleEngineSeeder::class );
        $this->call( VehicleTypeSeeder::class );
        $this->call( VehicleTransmissionSeeder::class );
        $this->call( ServiceSeeder::class );
        $this->call( ServiceCategorySeeder::class );
        $this->call( ServiceChildrenSeeder::class );
        $this->call( PaymentMethodSeeder::class );
    }
}
