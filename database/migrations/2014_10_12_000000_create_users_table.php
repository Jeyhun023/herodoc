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
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('jobname')->nullable();
            $table->text('description')->nullable();
            $table->string('education')->nullable();
            $table->string('skills')->nullable();
            $table->string('languages')->nullable();
            $table->string('city')->nullable();
            $table->integer('rate')->default(0);
            $table->enum('isFreelance', ['no','yes'])->default('no');
            $table->string('image')->default('/front/images/user/no_photo.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
