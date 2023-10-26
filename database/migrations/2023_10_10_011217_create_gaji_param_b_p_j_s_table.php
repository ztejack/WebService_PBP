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
        Schema::create('gaji_param_b_p_j_s', function (Blueprint $table) {
            $table->id();
            $table->string('tenagakerja_P');
            $table->string('kesehatan_P');
            $table->string('tenagakerja_K');
            $table->string('kesehatan_K');
            $table->foreignId('bpjs_param_id')->nullable()->constrained('param_b_p_s_j_s')->references('id')->on('param_b_p_s_j_s');
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
        Schema::dropIfExists('gaji_param_b_p_j_s');
    }
};
