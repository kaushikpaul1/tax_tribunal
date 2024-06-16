<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRgistercaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registercase', function (Blueprint $table) {
            $table->id();
            $table->string('casetype');
            $table->string('benchtype');
            $table->string('paymentdetails');
            $table->string('pfname');
            $table->string('pmname');
            $table->string('plname');
            $table->string('pemail');
            $table->string('pmobile');
            $table->string('pstate');
            $table->integer('pdistrict');
            $table->string('rdept');
            $table->string('rdesig');
            $table->string('advocname');
            $table->string('acknowledgment_number');
            $table->unsignedTinyInteger('status')->default(0); // New column for status with default value 0
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
        Schema::dropIfExists('rgistercase');
    }
}
