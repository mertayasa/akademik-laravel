<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataSikapToSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->text('sikap_spiritual')->nullable();
            $table->text('sikap_sosial')->nullable();
            $table->text('saran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropColumn('sikap_spiritual');
            $table->dropColumn('sikap_sosial');
            $table->dropColumn('saran');
        });
    }
}
