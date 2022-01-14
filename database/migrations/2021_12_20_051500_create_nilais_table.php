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
            $table->enum('semester', ['ganjil', 'genap'])->default('ganjil');
            $table->integer('tm1_p')->default(0);
            $table->integer('tm2_p')->default(0);
            $table->integer('tm3_p')->default(0);
            $table->integer('tm4_p')->default(0);
            $table->integer('tm1_k')->default(0);
            $table->integer('tm2_k')->default(0);
            $table->integer('tm3_k')->default(0);
            $table->integer('tm4_k')->default(0);
            $table->integer('pts')->default(0);
            $table->integer('pas')->default(0);
            $table->text('desk_pengetahuan')->nullable();
            $table->text('desk_keterampilan')->nullable();
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
