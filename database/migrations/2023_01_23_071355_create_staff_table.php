<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender')->nullable();
            $table->string('birthdate');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('dept');
            $table->string('role');
            $table->string('office_time');
            $table->string('em_start_date');
            $table->string('experience_yr'); // Calculate current date with em_start_date
            $table->string('profile_img')->nullable();
            $table->string('sign')->nullable();
            $table->string('remark')->nullable();
            $table->string('kbz_bank_acc')->nullable();
            $table->string('kbz_pay')->nullable();
            $table->string('aya_bank')->nullable();
            $table->string('yoma_bank')->nullable();
            $table->string('wave_money_number')->nullable();
            $table->string('status');  // Still working or Resigned form work
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
        Schema::dropIfExists('staff');
    }
}
