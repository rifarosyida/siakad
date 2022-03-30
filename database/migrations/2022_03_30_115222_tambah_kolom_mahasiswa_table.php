<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomMahasiswaTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa', function (Blueprint $table){
            $table->string('email')->after('no_hp')->nullable()->unique();
            $table->string('alamat')->after('email')->nullable();
            $table->date('tanggal_lahir')->after('alamat')->nullable();
        });
    }
    /**
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function (Blueprint $table){
            $table->dropColumn('email');
            $table->dropColumn('alamat');
            $table->dropColumn('tanggal_lahir');
    });
}
}
