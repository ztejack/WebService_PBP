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
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->string('gapok')->default(0);
            $table->string('tnj_ahli')->default(0);
            $table->string('total_gaji')->default(0);
            $table->string('tnj_jabatan')->default(0);
            $table->string('type_tunjab')->nullable();
            // $table->string('tnj_mkn')->nullable();
            // $table->string('tnj_perumahan')->nullable();
            // $table->string('tnj_transport')->nullable();
            // $table->string('tnj_shift')->nullable();
            // $table->string('fasilitas_lain')->nullable();
            $table->foreignId('employe_id')->constrained('employes')->references('id')->on('employes')->onDelete('cascade');
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
        Schema::dropIfExists('gajis');
    }
};
