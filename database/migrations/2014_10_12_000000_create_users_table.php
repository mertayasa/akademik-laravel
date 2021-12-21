<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->text('alamat');
            $table->text('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('no_tlp');
            $table->text('pekerjaan');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
            $table->enum('status_guru', ['tetap', 'honorer', 'bukan_guru'])->default('honorer');
            $table->enum('level', ['admin', 'guru', 'ortu'])->default('ortu');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
