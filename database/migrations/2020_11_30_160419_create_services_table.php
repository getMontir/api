<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('icon_id')->nullable();
            $table->string('name_id')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug')->nullable();
            $table->integer('price')->default(0);
            $table->integer('recommendation_up')->default(0);
            $table->integer('duration_easy')->default(0);
            $table->integer('duration_medium')->default(0);
            $table->integer('duration_hard')->default(0);
            $table->tinyInteger('is_easy')->default(0);
            $table->tinyInteger('is_medium')->default(0);
            $table->tinyInteger('is_hard')->default(0);
            $table->tinyInteger('is_tuneup')->default(0);
            $table->tinyInteger('is_package')->default(0);
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
        Schema::dropIfExists('services');
    }
}
