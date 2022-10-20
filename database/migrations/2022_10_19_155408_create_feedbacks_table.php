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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name',255)->comment('ten khach feedback');
            $table->string('customer_email',255);
            $table->string('customer_avatar',255)->nullable()->comment('avatar fake');
            $table->text('content');
            $table->tinyInteger('is_active')->default(0)->comment('Có được phép hiển thị phía fe hay không');
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
        Schema::dropIfExists('feedbacks');
    }
};
