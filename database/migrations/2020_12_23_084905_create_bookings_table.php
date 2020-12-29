<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('booking_date')->index();
            $table->bigInteger('customer_id')->index();
            $table->bigInteger('user_id')->index();
            $table->double('total_amount', [10,2])->default(0.00);
            $table->double('total_discount', [10,2])->default(0.00);
            $table->double('total_payable', [10,2])->default(0.00);
            $table->tinyInteger('payment_status')->default(0)->index();
            $table->softDeletes();
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
        Schema::dropIfExists('bookings');
    }
}
