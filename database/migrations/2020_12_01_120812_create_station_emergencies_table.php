<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_emergencies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('station_id');
            $table->bigInteger('emergency_id');
            $table->integer('basic_price')->default(0);
            $table->integer('sale_price')->default(0);
            $table->integer('upby')->default(0);
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
        Schema::dropIfExists('station_emergencies');
    }
}
