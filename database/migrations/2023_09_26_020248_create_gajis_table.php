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
            $table->string('gapok')->nullable()->default(0);
            $table->string('tnj_ahli')->nullable()->default(0);
            $table->string('total_gaji')->nullable()->default(0);
            $table->string('tnj_jabatan')->nullable()->default(0);
            $table->string('tnj_lapangan')->nullable()->default(0);
            $table->string('type_tunjab')->nullable()->default(0);
            $table->string('tnj_lain')->nullable()->default(0);


            $table->string('tnj_perumahan')->nullable()->default(0);
            $table->string('tnj_bantuan_perumahan')->nullable()->default(0);

            $table->string('tnj_dana_pensiun')->nullable()->default(0);
            $table->string('tnj_simmode')->nullable()->default(0);
            $table->string('tnj_bpjs_tk')->nullable()->default(0);
            $table->string('tnj_bpjs_jkm')->nullable()->default(0);
            $table->string('tnj_bpjs_jht')->nullable()->default(0);
            $table->string('tnj_bpjs_jp')->nullable()->default(0);
            $table->string('tnj_bpjs_kes')->nullable()->default(0);
            $table->string('tnj_pajak')->nullable()->default(0);

            $table->string('pot_serikat_pegawai_ba')->nullable()->default(0);
            $table->string('pot_lazis')->nullable()->default(0);
            $table->string('pot_dana_pensiun')->nullable()->default(0);
            $table->string('pot_simmode')->nullable()->default(0);
            $table->string('pot_koperasi')->nullable()->default(0);
            $table->string('pot_bpjs_tk')->nullable()->default(0);
            $table->string('pot_bpjs_jkm')->nullable()->default(0);
            $table->string('pot_bpjs_jht')->nullable()->default(0);
            $table->string('pot_bpjs_jp')->nullable()->default(0);
            $table->string('pot_bpjs_kes')->nullable()->default(0);
            $table->string('pot_pajak')->nullable()->default(0);
            $table->string('pot_lain')->nullable()->default(0);

            // penambahan
            $table->string('tnj_makan')->nullable()->default(0);
            $table->string('tnj_transport')->nullable()->default(0);
            $table->string('tnj_shift')->nullable()->default(0);
            // penambahan

            $table->boolean('bpjs_status')->nullable()->default(true);
            $table->foreignId('employe_id')->constrained('employes')->references('id')->on('employes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create(
            'tunjangans',
            function (Blueprint $table) {
                $table->id();
                $table->string('nama_tnj');
                $table->string('jenis_tnj');
                $table->string('jumlah_tnj');
                $table->timestamps();
            }
        );
        Schema::create(
            'pivot_tnj_gaji',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('tunjangans_id');
                $table->unsignedBigInteger('gaji_id');
                $table->foreign('tunjangans_id')->references('id')->on('tunjangans')->onDelete('cascade');
                $table->foreign('gaji_id')->references('id')->on('gajis')->onDelete('cascade');
                $table->timestamps();
            }
        );
        Schema::create('gaji_lemburs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(now());
            $table->integer('jumlah');
            $table->foreignId('employe_id')->constrained('employes')->references('id')->on('employes')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('gaji_rapels', function (Blueprint $table) {
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
        Schema::dropIfExists('gaji_rapels');
        Schema::dropIfExists('gajis');
    }
};
