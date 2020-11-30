<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('station_id')->nullable();
            $table->bigInteger('mechanic_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('customer_vehicle_id')->nullable();
            $table->string('reff')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->text('address')->nullable();
            $table->text('point_note')->nullable();
            $table->integer('total')->default(0);
            $table->integer('discount_amount')->default(0);
            $table->bigInteger('discount')->default(0);
            $table->text('geocode')->nullable();
            $table->timestamp('order_timestamp')->nullable();
            $table->timestamp('service_timestamp')->nullable();
            $table->tinyInteger('is_service')->default(0);
            $table->tinyInteger('is_sparepart')->default(0);
            $table->tinyInteger('is_emergency')->default(0);
            $table->tinyInteger('is_promo')->default(0);
            $table->tinyInteger('order_status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
