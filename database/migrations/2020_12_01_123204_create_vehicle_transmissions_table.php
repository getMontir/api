<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTransmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_transmissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('image_id')->nullable();
            $table->bigInteger('type_id')->nullable();
            $table->bigInteger('engine_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('from_year')->default(0);
            $table->integer('to_year')->default(0);
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
        Schema::dropIfExists('vehicle_transmissions');
    }
}
