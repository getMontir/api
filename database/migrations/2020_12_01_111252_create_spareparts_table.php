<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('image_id')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->bigInteger('engine_id')->nullable();
            $table->bigInteger('service_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('price_buy')->default(0);
            $table->integer('price_sale')->default(0);
            $table->tinyInteger('duration_normal')->default(0);
            $table->tinyInteger('duration_hard')->default(0);
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
        Schema::dropIfExists('spareparts');
    }
}
