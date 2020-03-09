<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->date('date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->float('rate')->nullable();
            $table->enum('rate_type', ['hourly', 'flat'])->default('hourly');
            $table->json('children')->nullable();
            $table->enum('status', ['pending', 'scheduled', 'cancelled', 'active', 'invoiced', 'completed'])
                ->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['date', 'start_time', 'end_time','rate', 'rate_type', 'children', 'status']);
        });
    }
}
