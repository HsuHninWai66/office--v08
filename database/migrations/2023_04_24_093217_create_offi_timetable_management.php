<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffiTimetableManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offi_timetable_management', function (Blueprint $table) {
            $table->id();
            $table->string('staff_name');
            $table->string('dept');
            $table->string('office_time');
            $table->string('total_present_days');
            $table->string('total_off_days');
            $table->string('absence_days');
            $table->string('half_absence_days');
            $table->string('late_upto_15min');
            $table->string('late_over_15min');
            $table->string('overtime_days');
            $table->string('sleep_days');
            $table->string('daily_bonus_fee');
            $table->string('remark');
            $table->string('cur_datetime');
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
        Schema::dropIfExists('offi_timetable_management');
    }
}
