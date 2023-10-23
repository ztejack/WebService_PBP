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
        Schema::create('gaji_slips', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('gapok')->nullable();
            $table->string('tnj_jabatan')->nullable();
            $table->string('total_tnj_makan')->nullable();
            $table->string('tnj_perumahan')->nullable();
            $table->string('total_tnj_shift')->nullable();
            $table->string('total_tnj_transport')->nullable();
            $table->string('aprv_1')->nullable();
            $table->string('aprv_2')->nullable();
            $table->string('aprv_3')->nullable();
            $table->foreignId('employe_id')->constrained('employes')->references('id')->on('employes');
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
        Schema::dropIfExists('gaji_slips');
    }
};
