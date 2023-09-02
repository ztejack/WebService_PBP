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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            // $table->string('uuid')->unique();
            $table->string('nip')->nullable();
            $table->string('npwp')->nullable();
            $table->string('ttl')->nullable();
            $table->string('address')->nullable();
            $table->string('ktp_address')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('golongan')->nullable();
            $table->boolean('status')->default(true);
            $table->dateTime('date_start')->nullable();
            $table->string('tenure')->nullable();
            $table->string('contract_type')->nullable();
            $table->foreignId('satker_id')->default('1')->constrained('satkers')->references('id')->on('satkers');
            $table->foreignId('user_id')->constrained('users')->references('id')->on('users');
            $table->foreignId('position_id')->nullable()->constrained('positions')->references('id')->on('positions');
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
        Schema::dropIfExists('employees');
    }
};
