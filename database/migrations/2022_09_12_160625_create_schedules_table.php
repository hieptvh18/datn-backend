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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable(false);
            $table->date('birthday')->nullable();
            $table->smallInteger('gender');
            $table->string('phone',15);// not null
            $table->string('email',255)->nullable();
            $table->string('address',500)->nullable();
            $table->string('cmnd',20)->nullable();
            $table->string('content');// noi dung van de benh mac phai
            $table->date('date');
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
        Schema::dropIfExists('schedules');
    }
};
