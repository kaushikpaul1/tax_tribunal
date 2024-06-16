<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignBenchTable extends Migration
{
    public function up()
    {
        Schema::create('assignbench', function (Blueprint $table) {
            $table->id();
            $table->string('acknowledgment_number');
            $table->string('case_number');
            $table->string('bench');
            $table->string('judge_name');
            $table->date('hearing_date');
            $table->time('hearing_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assign_bench');
    }
}
