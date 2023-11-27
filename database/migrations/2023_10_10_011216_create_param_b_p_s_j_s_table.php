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
        Schema::create('param_b_p_s_j_s', function (Blueprint $table) {
            $table->id();
            $table->string('jht_E')->default(0);
            $table->string('jp_E')->default(0);

            $table->string('jkk_P')->default(0);
            $table->string('jkm_P')->default(0);
            $table->string('jht_P')->default(0);
            $table->string('jp_P')->default(0);
            $table->string('gaji_max_jp')->default(0);

            $table->string('tk_E')->default(0);
            $table->string('tk_P')->default(0);

            $table->string('kes_E')->default(0);
            $table->string('kes_P')->default(0);

            $table->string('kes_max')->default(0);
            $table->string('kes_min')->default(0);

            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('param_b_p_s_j_s');
    }
};
