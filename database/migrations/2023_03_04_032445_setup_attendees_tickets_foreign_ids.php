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
        Schema::table('attendees', function (Blueprint $table) {
            $table->foreign('guest_id')->references('id')->on('attendees')->onDelete('cascade');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('attendee_id')->references('id')->on('attendees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendees', function (Blueprint $table) {
            $table->dropForeign('attendees_guest_id_foreign');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_attendee_id_foreign');
        });
    }
};
