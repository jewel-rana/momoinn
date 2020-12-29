<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('code', 12)->index();
            $table->enum('type', ['percent', 'flat'])->default('percent');
            $table->double('amount', [10,2])->default(0);
            $table->date('offer_start')->index();
            $table->date('offer_end')->index();
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
        Schema::dropIfExists('coupons');
    }
}
