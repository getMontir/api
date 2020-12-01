<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_owners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('station_id');
            $table->string('member_id')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender', 1)->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('province_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->string('postcode', 5)->nullable();
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
        Schema::dropIfExists('station_owners');
    }
}
