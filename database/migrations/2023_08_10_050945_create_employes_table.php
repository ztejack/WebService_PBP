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
            $table->string('uuid')->unique();
            $table->string('nip');
            $table->string('npwp');
            $table->string('ttl');
            $table->string('address');
            $table->string('ktp_address');
            $table->string('gender');
            $table->string('religion');
            $table->string('blood_type');
            $table->string('golongan');
            $table->boolean('status');
            $table->date('date_start');
            $table->string('tenure');
            $table->string('contract_type');
            $table->foreignId('subsatker_id')->default(false)->references('id')->on('subsatkers');
            $table->foreignId('user_id')->default(false)->references('id')->on('users');
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
