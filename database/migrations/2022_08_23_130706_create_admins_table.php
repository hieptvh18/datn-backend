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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('fullname');
            $table->date('birthday')->nullable();
            $table->string('phone')->unique();
            $table->string('address')->nullable();
            $table->string('facebook_url')->nullable()->comment('link fb ca nhan');
            $table->string('twitter_url')->nullable()->comment('link twitter ca nhan');
            $table->string('email_url')->nullable()->comment('link email ca nhan');
            $table->string('password'); 
            $table->tinyInteger('is_active')->default(1)->comment('1 is active, 0 is not active');
            $table->foreignId('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreignId('level_id');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreignId('specialist_id')->comment('Bác sĩ thuộc phòng ban');
            $table->foreign('specialist_id')->references('id')->on('specialists')->onDelete('cascade');
         
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
        Schema::dropIfExists('admins');
    }
};
