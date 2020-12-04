<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vehicle_transmission_id')->nullable();
            $table->bigInteger('sparepart_brand_id')->nullable();
            $table->json('data_sparepart')->nullable();
            $table->json('data_service')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_products');
    }
}
