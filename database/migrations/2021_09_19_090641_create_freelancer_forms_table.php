<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_forms', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('education_level');
            $table->string('education');
            $table->string('skills');
            $table->string('content');
            $table->string('email');
            $table->string('phone');
            $table->mediumText('address');
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
        Schema::dropIfExists('freelancer_forms');
    }
}
