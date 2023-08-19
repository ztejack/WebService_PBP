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
            $table->string('blood_type')->nullable();
            $table->string('golongan')->nullable();
            $table->boolean('status')->nullable();
            $table->dateTime('date_start')->nullable();
            $table->string('tenure')->nullable();
            $table->string('contract_type')->nullable();
            $table->foreignId('subsatkerId')->default('1')->references('id')->on('subsatkers');
            $table->foreignId('user_id')->constrained('users')->references('id')->on('users');
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
