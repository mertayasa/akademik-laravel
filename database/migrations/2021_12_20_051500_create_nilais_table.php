<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggota_kelas');
            $table->unsignedBigInteger('id_mapel');
            $table->integer('tugas');
            $table->integer('uts');
            $table->integer('uas');
            $table->text('desk_pengetahuan');
            $table->text('desk_keterampilan');
            $table->timestamps();

            $table->foreign('id_anggota_kelas')->references('id')->on('anggota_kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_mapel')->references('id')->on('mapel')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
}
