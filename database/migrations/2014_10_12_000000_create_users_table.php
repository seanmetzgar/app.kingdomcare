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
            $table->uuid('id')->primary();
            $table->string('email')->unique();
            $table->string('password');

            // Basic Info
            $table->string('first_name');
            $table->string('last_name');

            // Extended Basic Info
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('phone')->nullable();

            // Date of Birth
            $table->date('dob')->nullable();

            // Email verification field (if needed)
            $table->timestamp('email_verified_at')->nullable();

            // Laravel generated fields
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
