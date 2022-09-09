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
        Schema::create('specialist_gallery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialist_id');
            $table->foreign('specialist_id')->references('id')->on('specialists')->onDelete('cascade');
            $table->string('path')->comment('image option path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialist_gallery');
    }
};
