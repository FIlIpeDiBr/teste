<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timeslots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('day_id');
            $table->string('responsible');
            $table->integer('hour');
            $table->string('event');
            $table->timestamps();

            $table->foreign('responsible')->references('siape')->on('users')->onDelete('CASCADE');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timeslots');
    }
};
