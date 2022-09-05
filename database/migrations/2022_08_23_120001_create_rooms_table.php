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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_name',225)->comment('Tên phòng ban');  
            $table->longText('history')->nullable()->comment('Lịch sử phát triển');  
            $table->text('mission')->nullable()->comment('nhiệm vụ, vai trò');  
            $table->text('achievement')->nullable()->comment('Thành tựu');  
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
        Schema::dropIfExists('rooms');
    }
};
