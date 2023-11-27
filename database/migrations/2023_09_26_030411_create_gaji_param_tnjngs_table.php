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
        Schema::create('gaji_param_tnjngs', function (Blueprint $table) {
            $table->id();
            $table->string('tnj_transport')->nullable()->default(false);
            $table->string('tnj_perumahan')->nullable()->default(false);
            $table->string('tnj_makan')->nullable()->default(false);
            $table->string('tnj_shift')->nullable()->default(false);
            $table->foreignId('golongan_id')->nullable()->constrained('golongans')->references('id')->on('golongans');
            $table->foreignId('position_id')->nullable()->constrained('positions')->references('id')->on('positions');
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
        Schema::dropIfExists('gaji_param_tnjngs');
    }
};
