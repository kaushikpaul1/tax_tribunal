<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHearingdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
// database/migrations/xxxx_xx_xx_create_hearings_table.php
public function up()
{
    Schema::create('hearingdetails', function (Blueprint $table) {
        $table->id();
        $table->string('acknowledgment_number');
        $table->date('hearing_date');
        $table->string('pdf_path');
        $table->boolean('publishstatus')->default(0);
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
        Schema::dropIfExists('hearingdetails');
    }
}
