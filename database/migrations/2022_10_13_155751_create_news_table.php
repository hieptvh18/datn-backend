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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->comment('tieu de bai post');
            $table->foreignId('news_category')->nullable()->comment('ID danh muc bai post');
            $table->foreign('news_category')->references('id')->on('news_categories')->onDelete('cascade');
            $table->longText('content')->comment('noi dung chi tiet bai post');
            $table->foreignId('author_id')->nullable()->comment('ID tac gia');
            $table->foreign('author_id')->references('id')->on('admins');
            $table->string('tags')->nullable()->comment('the tag gan kem bai post, luu nhieu tag cung luc dang string cach nhau dau ","');
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
        Schema::dropIfExists('news');
    }
};
