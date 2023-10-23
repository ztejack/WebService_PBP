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
        Schema::create('gaji_param_tun_jabs', function (Blueprint $table) {
            $table->id();
            $table->string('gaji_struktural')->default(0);
            $table->string('gaji_fungsional')->default(0);
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
        Schema::dropIfExists('gaji_param_tun_jabs');
    }
};
