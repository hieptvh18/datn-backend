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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name',255)->comment('ten khach hang');
            $table->string('customer_phone',15);
            $table->string('payment_method',255)->nullable();
            $table->text('description')->nullable();
            $table->string('product_id');
            $table->string('service_id');
            $table->string('code_bill');
            $table->integer('total');

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
        Schema::dropIfExists('orders');
    }
};
