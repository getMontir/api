<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('image_id')->nullable();
            $table->tinyInteger('type')->default('0');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->tinyInteger('order')->default(0);
            $table->decimal('customer_percentage')->default(0);
            $table->decimal('gm_percentage')->default(0);
            $table->decimal('station_percentage')->default(0);
            $table->decimal('mechanic_percentage')->default(0);
            $table->text('percentage')->nullable();
            $table->text('action')->nullable();
            $table->text('parameter')->nullable();
            $table->tinyInteger('is_debug_mode')->default(0);
            $table->tinyInteger('is_open_by_default')->default(0);
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
        Schema::dropIfExists('payment_methods');
    }
}
