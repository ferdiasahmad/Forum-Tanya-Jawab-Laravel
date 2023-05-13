<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('jawabans', function (Blueprint $table) {
        //     $table->id('id_jawaban');
        //     $table->integer('id_pertanyaan');
        //     $table->integer('id_user');
        //     $table->string('isi');
        //     $table->timestamps();

        Schema::create('jawabans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pertanyaan')->references('id')->on('pertanyaans')->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('isi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawabans');
    }
};
