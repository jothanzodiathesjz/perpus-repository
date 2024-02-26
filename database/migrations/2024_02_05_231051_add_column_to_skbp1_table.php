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
        Schema::table('skbp1s', function (Blueprint $table) {
            //
            $table->text('bab4')->nullable();
            $table->text('reference')->nullable();
            $table->text('conclusion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skbp1', function (Blueprint $table) {
            //
        });
    }
};
