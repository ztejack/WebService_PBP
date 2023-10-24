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
            $table->string('jht_E');
            $table->string('jp_E');

            $table->string('jkk_P');
            $table->string('jkm_P');
            $table->string('jht_P');
            $table->string('jp_P');

            $table->string('kes_E');
            $table->string('kes_P');

            $table->string('kes_max');
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
