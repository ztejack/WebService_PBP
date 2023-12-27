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
        Schema::create('family_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('familystatus');
            $table->timestamps();
        });

        Schema::create('gaji_param_families', function (Blueprint $table) {
            $table->id();
            $table->string('tnj_familystatus')->nullable()->default(false);
            $table->foreignId('familystatus_id')->nullable()->constrained('family_statuses')->references('id')->on('family_statuses');
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
        Schema::dropIfExists('family_statuses');
        Schema::dropIfExists('gaji_param_families');
    }
};
