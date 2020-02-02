<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHookahBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hookah_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('hookah_id');
            $table->foreign('hookah_id')
                ->references('id')
                ->on('hookahs')
                ->onDelete('cascade');
            $table->string('customer_name');
            $table->integer('customers_count')->default(1);
            $table->dateTime('offered_date_start');
            $table->dateTime('offered_date_end');
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
        Schema::dropIfExists('hookah_bookings');
    }
}
