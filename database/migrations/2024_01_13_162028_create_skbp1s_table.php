<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skbp1s', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->string('id_user');
            $table->string('tahun');
            $table->string('nama');
            $table->string('stambuk');
            $table->string('fakultas');
            $table->string('jurusan');
            $table->string('judul');
            $table->text('abstrak');
            $table->string('turnitin')->nullable();
            $table->text('bab1')->nullable();
            $table->text('bab2')->nullable();
            $table->text('bab3')->nullable();
            $table->text('fulltext')->nullable();
            $table->string('sampul')->nullable();
            $table->string('alamat')->nullable();
            $table->string('type');
            $table->string('volume');
            $table->boolean('show')->default(false);
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
        Schema::dropIfExists('skbp1s');
    }
};
