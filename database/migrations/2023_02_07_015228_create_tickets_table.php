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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->timestamp('picked_up')->nullable();
            $table->timestamp('paid_on')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_id')->nullable();
            $table->unsignedBigInteger('attendee_id')->nullable();
            $table->unsignedInteger('event_id');
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
        Schema::dropIfExists('tickets');
    }
};
