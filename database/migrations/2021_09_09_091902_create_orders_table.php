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
            $table->unsignedBigInteger('advert_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['waiting','loading','finished','rejected'])->default('waiting');
            $table->string('order_no');
            $table->integer('payment')->comment('AZN');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('advert_id')->references('id')->on('adverts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
