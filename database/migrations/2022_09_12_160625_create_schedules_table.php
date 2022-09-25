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
            $table->smallInteger('gender')->default(1);// 1 is nam, 2 is nu, 3 is null
            $table->string('phone',15);// not null
            $table->string('email',255)->nullable();
            $table->string('address',500)->nullable();
            $table->string('cmnd',20)->nullable();
            $table->string('content')->nullable();// noi dung van de benh mac phai
            $table->date('date');
            $table->tinyInteger('status')->default(0)->comment('Status lịch khám: 0 is chưa xác nhận, 1 is đã xác nhận, 2 is hủy lịch');
            $table->timestamps();
        });
    }
    ////...

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
