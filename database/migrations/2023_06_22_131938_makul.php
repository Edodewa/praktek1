<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Makul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makul', function (Blueprint $table) {
            $table->string('kode_kelas')->primary();
            $table->string('nama_makul');
            $table->string('ruangan');
            $table->string('kelas');
            $table->string('sks');
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
        Schema::dropIfExists('makul');
    }
}