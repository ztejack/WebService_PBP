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
        Schema::create('param_p_p_h_s', function (Blueprint $table) {
            $table->id();
            $table->string('biaya_jabatan')->nullable()->default(false);
            $table->string('jumlah_kategori_pertama')->nullable()->default(false);
            $table->string('persentase_kategori_pertama')->nullable()->default(false);
            $table->string('pengurang_kategori_pertama')->nullable()->default(false);

            $table->string('jumlah_kategori_kedua')->nullable()->default(false);
            $table->string('persentase_kategori_kedua')->nullable()->default(false);
            $table->string('pengurang_kategori_kedua')->nullable()->default(false);

            $table->string('jumlah_kategori_ketiga')->nullable()->default(false);
            $table->string('persentase_kategori_ketiga')->nullable()->default(false);
            $table->string('pengurang_kategori_ketiga')->nullable()->default(false);

            $table->string('jumlah_kategori_keempat')->nullable()->default(false);
            $table->string('persentase_kategori_keempat')->nullable()->default(false);
            $table->string('pengurang_kategori_keempat')->nullable()->default(false);

            $table->string('jumlah_kategori_kelima')->nullable()->default(false);
            $table->string('persentase_kategori_kelima')->nullable()->default(false);
            $table->string('pengurang_kategori_kelima')->nullable()->default(false);
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
        Schema::dropIfExists('param_p_p_h_s');
    }
};
