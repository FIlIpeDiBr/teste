<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       DB::unprepared('
       CREATE TRIGGER beforeInsertOnTimeslots
       BEFORE INSERT ON timeslots
       FOR EACH ROW
       BEGIN
           IF NEW.hour < 8 OR NEW.hour > 21 THEN
               SIGNAL SQLSTATE "45000"
               SET MESSAGE_TEXT = "The given hour is outside the allowed range of 8h to 21h";
           END IF;
       END;
       ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS beforeInsertTimeslots');
    }
};
