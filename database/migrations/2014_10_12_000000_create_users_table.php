<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id');
            $table->bigInteger('picture_id')->nullable();
            $table->string('token')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phonenumber')->nullable()->unique();
            $table->string('verify_token')->nullable();
            $table->rememberToken();
            $table->tinyInteger('is_accepted')->default(0);
            $table->tinyInteger('is_information_completed')->default(0);
            $table->tinyInteger('is_document_completed')->default(0);
            $table->tinyInteger('is_banned')->default(0);
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
