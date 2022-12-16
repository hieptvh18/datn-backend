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
        Schema::table('admins', function (Blueprint $table) {

            $table->dropForeign('admins_room_id_foreign');
            $table->dropForeign('admins_level_id_foreign');
            $table->dropForeign('admins_specialist_id_foreign');

            $table->dropColumn('room_id');
            $table->dropColumn('level_id');
            $table->dropColumn('specialist_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign('admins_room_id_foreign');
            $table->dropForeign('admins_level_id_foreign');
            $table->dropForeign('admins_specialist_id_foreign');

            $table->dropColumn('room_id');
            $table->dropColumn('level_id');
            $table->dropColumn('specialist_id');

        });
    }
};
