<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('otp_code')->nullable();

            $table->string('pass')->nullable();
            $table->string('title')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->string('marital_status')->nullable();

            $table->string('identification_type')->nullable();
            $table->string('id_expiry')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_front_img')->nullable();
            $table->string('id_back_img')->nullable();

            $table->string('employment')->nullable();
            $table->string('source_of_income')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('ss_code')->nullable();
            $table->string('confirm_ss_code')->nullable();

            $table->integer('status')->default(0); // check is account is active
            $table->integer('admin')->default(0);
            $table->integer('send_email')->default(1)->nullable();
            $table->integer('bypass_code')->default(0)->nullable();

            // Transfer Code
            $table->string('admin_first_code')->default('000000');
            $table->string('admin_second_code')->default('000000');
            $table->string('admin_third_code')->default('000000');

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
};
