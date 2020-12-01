<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_spareparts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('station_id');
            $table->bigInteger('sparepart_id');
            $table->integer('gm_buy_price')->default(0);
            $table->integer('gm_sale_price')->default(0);
            $table->integer('buy_price')->default(0);
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
        Schema::dropIfExists('station_spareparts');
    }
}
