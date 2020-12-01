<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('owner_identity_image_id')->nullable();
            $table->bigInteger('station_image_id')->nullable();
            $table->bigInteger('station_skpt_image_id')->nullable();
            $table->bigInteger('station_pbb_image_id')->nullable();
            $table->bigInteger('station_skrk_image_id')->nullable();
            $table->tinyInteger('is_accepted_owner_identity')->default(0);
            $table->tinyInteger('is_accepted_station_image')->default(0);
            $table->tinyInteger('is_accepted_skpt_image')->default(0);
            $table->tinyInteger('is_accepted_pbb_image')->default(0);
            $table->tinyInteger('is_accepted_skrk_image')->default(0);
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
        Schema::dropIfExists('station_documents');
    }
}
