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
            $table->date("payroll")->nullable();
            $table->string("name")->nullable();
            $table->string("jumlah")->default(false);
            $table->string("total")->default(false);
            $table->string("status")->nullable();
            $table->string("type")->nullable();
            $table->string("aprv_1")->default(false);
            $table->string("aprv_2")->default(false);
            $table->string("aprv_3")->default(false);
            $table->string("aprv_4")->default(false);
            $table->timestamps();
        });
        Schema::create('gaji_slips', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('golongan')->nullable();
            $table->string('status_keluarga')->nullable();
            $table->string('date')->nullable();
            $table->string('gapok')->nullable()->default(0);
            $table->string('tnj_jabatan')->nullable()->default(0);
            $table->string('tnj_ahli')->nullable()->default(0);
            $table->string('tnj_makan')->nullable()->default(0);
            $table->string('tnj_bantuan_perumahan')->nullable()->default(0);
            $table->string('tnj_shift')->nullable()->default(0);
            $table->string('tnj_transport')->nullable()->default(0);
            $table->string('tnj_lapangan')->nullable()->default(0);
            $table->string('tnj_lain')->nullable()->default(0);

            // direksi

            $table->string('tnj_perumahan')->nullable()->default(0);
            $table->string('tnj_dana_pensiun')->nullable()->default(0);
            $table->string('tnj_simmode')->nullable()->default(0);
            $table->string('tnj_pajak')->nullable()->default(0);

            $table->string('tnj_bpjs_jkm')->nullable()->default(0);
            $table->string('tnj_bpjs_jht')->nullable()->default(0);
            $table->string('tnj_bpjs_jp')->nullable()->default(0);

            $table->string('tnj_bpjs_tk')->nullable()->default(0);
            $table->string('tnj_bpjs_kes')->nullable()->default(0);

            $table->string('pot_bpjs_tk')->nullable()->default(0);
            $table->string('pot_bpjs_kes')->nullable()->default(0);
            $table->string('pot_serikat_pegawai_ba')->nullable()->default(0);
            $table->string('pot_koperasi')->nullable()->default(0);
            $table->string('pot_lazis')->nullable()->default(0);
            $table->string('pot_dana_pensiun')->nullable()->default(0);
            $table->string('pot_simmode')->nullable()->default(0);
            $table->string('pot_bpjs_jkm')->nullable()->default(0);
            $table->string('pot_bpjs_jht')->nullable()->default(0);
            $table->string('pot_bpjs_jp')->nullable()->default(0);
            $table->string('pot_pajak')->nullable()->default(0);
            $table->string('pot_lain')->nullable()->default(0);

            $table->string('pot_sakit')->nullable()->default(0);
            $table->string('pot_kosong')->nullable()->default(0);
            $table->string('pot_terlambat')->nullable()->default(0);
            $table->string('pot_perjalanan')->nullable()->default(0);

            $table->string('lembur')->nullable()->default(0);
            $table->string('rapel')->nullable()->default(0);
            $table->string('total')->nullable()->default(0);
            $table->string('status')->nullable();
            $table->foreignId('employe_id')->constrained('employes')->references('id')->on('employes');
            $table->foreignId('gaji_submit_id')->constrained('gaji_submits')->references('id')->on('gaji_submits')->onDelete('cascade');
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
