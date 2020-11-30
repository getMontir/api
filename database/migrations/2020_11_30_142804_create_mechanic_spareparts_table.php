<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechanicSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanic_spareparts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mechanic_id');
            $table->bigInteger('sparepart_id');
            $table->integer('basic_price')->default(0);
            $table->integer('sale_price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mechanic_spareparts');
    }
}
