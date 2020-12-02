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
            $table->bigInteger('payment_method_id')->nullable();
            $table->bigInteger('station_id')->nullable();
            $table->bigInteger('mechanic_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('customer_vehicle_id')->nullable();
            $table->string('reff')->nullable();
            $table->point('service_location')->nullable();
            $table->point('mechanic_location')->nullable();
            $table->point('station_location')->nullable();
            $table->text('address')->nullable();
            $table->text('point_note')->nullable();
            $table->decimal('distant')->default(0);
            $table->decimal('distant_price')->default(0);
            $table->decimal('total')->default(0);
            $table->decimal('paid')->default(0);
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
            $table->text('session_data')->nullable();
            $table->text('hash_salt')->nullable();
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
