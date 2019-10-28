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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username');
            $table->string('vepost_code');
            $table->string('vepost_address');
            $table->string('display_name');
            $table->string('control_string')->default('00000000000000000000')->nullable();
            $table->string('balance')->nullable();
            $table->string('vepost_counter')->nullable();
            $table->string('status')->default(0)->nullable();
            $table->string('free_send_left')->nullable();
            $table->string('country_code');
            $table->string('phone');
            $table->string('vep_code');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
