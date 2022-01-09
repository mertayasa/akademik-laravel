<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunAjarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahun_ajar', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_mulai');
            $table->integer('tahun_selesai');
            $table->date('mulai_smt_ganjil')->nullable();
            $table->date('selesai_smt_ganjil')->nullable();
            $table->date('mulai_smt_genap')->nullable();
            $table->date('selesai_smt_genap')->nullable();
            
            $table->enum('status', ['aktif', 'nonaktif'])->default('nonaktif');
            $table->string('keterangan', 50);
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
        Schema::dropIfExists('tahun_ajars');
    }
}
