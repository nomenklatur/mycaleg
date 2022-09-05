<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calegs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id');
            $table->foreignId('dapil_id');
            $table->string('nama');
            $table->string('uri')->unique();
            $table->string('tanggal_lahir');
            $table->text('visi');
            $table->text('misi');
            $table->integer('pendidikan');
            $table->integer('penghasilan');
            $table->integer('kekayaan');
            $table->integer('pengalaman');
            $table->integer('keanggotaan'); 
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
        Schema::dropIfExists('calegs');
    }
}
