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
        Schema::create('gaji_submits', function (Blueprint $table) {
            $table->id();
            $table->string("payroll");
            $table->string("name");
            $table->string("jumlah");
            $table->string("total");
            $table->string("status");
        });
        Schema::create('gaji_slips', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('gapok')->nullable();
            $table->string('tnj_jabatan')->nullable();
            $table->string('tnj_ahli')->nullable();
            $table->string('total_tnj_makan')->nullable();
            $table->string('tnj_perumahan')->nullable();
            $table->string('total_tnj_shift')->nullable();
            $table->string('total_tnj_transport')->nullable();
            $table->string('aprv_1')->nullable();
            $table->string('aprv_2')->nullable();
            $table->foreignId('employe_id')->constrained('employes')->references('id')->on('employes');
            $table->foreignId('submit_id')->constrained('gaji_submits')->references('id')->on('gaji_submits');
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
        Schema::dropIfExists('aproves');
        Schema::dropIfExists('gaji_slips');
    }
};
