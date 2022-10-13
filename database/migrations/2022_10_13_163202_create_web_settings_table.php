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
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo',255)->comment('logo: png,jpg,jpeg');
            $table->string('web_name',255)->comment('ten website|ten doanh nghiep');
            $table->string('base_url',255)->nullable()->comment('link website');
            $table->string('phones',15)->nullable()->default('0989581167')->comment('so dien thoai lien he, luu nhieu so');
            $table->string('email',255)->nullable()->default('nhakhoaducnghia@gmail.com')->comment('email');
            $table->string('facebook_url',255)->nullable()->default('https://facebook.com')->comment('fb');
            $table->string('twitter_url',255)->nullable()->default('https://facebook.com')->comment('twitter_url');
            $table->string('instagram_url',255)->nullable()->default('https://facebook.com')->comment('instagram_url');
            $table->string('youtobe_url',255)->nullable()->default('https://facebook.com')->comment('youtobe_url');
            $table->text('address')->default('ngõ 155, đường Cầu Giấy')->comment('dia chi');
            $table->string('open_time')->comment('gio mo cua');
            $table->string('close_time')->comment('gio dong cua');
            $table->date('start_date')->comment('ngay bat dau lam viec trong tuan');
            $table->date('end_date')->comment('ngay ket thuc trong tuan');
            $table->text('short_introduce')->comment('gioi thieu ngan')->default('Triết lý của ĐỨC NGHĨA sẽ giúp bạn khỏe mạnh, hạnh phúc vì chúng tôi hiểu vai trò quan trọng trong sức khỏe răng miệng của bạn.');
            $table->longText('introduce')->comment('gioi thieu chi tiet ve chung toi');
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
        Schema::dropIfExists('news_web_settings');
    }
};
