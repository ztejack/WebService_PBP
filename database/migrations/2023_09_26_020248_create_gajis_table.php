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
            $table->string('tnj_lapangan')->default(0);
            $table->string('type_tunjab')->nullable();
            // $table->string('tnj_mkn')->nullable();
            // $table->string('tnj_perumahan')->nullable();
            // $table->string('tnj_transport')->nullable();
            // $table->string('tnj_shift')->nullable();
            // $table->string('fasilitas_lain')->nullable();
            $table->foreignId('employe_id')->constrained('employes')->references('id')->on('employes')->onDelete('cascade');
            $table->timestamps();
        });

        // Schema::create(
        //     'tunjangans',
        //     function (Blueprint $table) {
        //         $table->id();
        //         $table->string('nama_tnj');
        //         $table->string('jenis_tnj');
        //         $table->string('jumlah_tnj');
        //         $table->timestamps();
        //     }
        // );
        // Schema::create(
        //     'pivot_tnj_gaji',
        //     function (Blueprint $table) {
        //         $table->id();
        //         $table->unsignedBigInteger('tunjangans_id');
        //         $table->unsignedBigInteger('gaji_id');
        //         $table->foreign('tunjangans_id')->references('id')->on('tunjangans')->onDelete('cascade');
        //         $table->foreign('gaji_id')->references('id')->on('gajis')->onDelete('cascade');
        //         $table->timestamps();
        //     }
        // );
        Schema::create('gaji_lemburs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(now());
            $table->integer('jumlah');
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
        // Schema::dropIfExists('pivot_tnj_gaji');
        // Schema::dropIfExists('tunjangans');
        Schema::dropIfExists('gaji_lemburs');
        Schema::dropIfExists('gajis');
    }
};
