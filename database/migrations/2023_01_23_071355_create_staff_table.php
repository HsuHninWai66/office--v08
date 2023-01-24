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
            $table->string('name');
            $table->string('gender');
            $table->string('dept');
            $table->string('role'); 
            $table->string('office_time');
            $table->string('em_start_date');
            $table->string('experience_yr'); // Calculate current date with em_start_date
            $table->string('profile_img');
            $table->string('sign');
            $table->string('remark');
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
