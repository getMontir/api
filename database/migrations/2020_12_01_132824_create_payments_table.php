<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type_user')->default(0);
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('payment_method_id')->nullable();
            $table->timestamp('payment_timestamp')->nullable();
            $table->string('source')->nullable();
            $table->decimal('amount', 12)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->text('gateway_response')->nullable();
            $table->string('order_id_chq_number')->nullable();
            $table->string('po_number')->nullable();
            $table->string('extra_accounting')->nullable();
            $table->text('data_details')->nullable();
            $table->text('redirect_url')->nullable();
            $table->text('redirect_arg')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
