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
        Schema::create('tunjangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tnj');
            $table->string('jumlah_tnj');
            $table->foreignId('gaji_param_id')->constrained('gaji_param_tnjngs')->references('id')->on('gaji_param_tnjngs');
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
        Schema::dropIfExists('tunjangans');
    }
};
