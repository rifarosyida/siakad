<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomFotoTable extends Migration
{
    public function up()
    {
        Schema::table('mahasiswa', function (Blueprint $table){
            $table->string('featured_image')->after('jurusan')->nullable();
        });
    }
    public function down()
    {
        Schema::table('mahasiswa', function (Blueprint $table){
            $table->dropColumn('featured_image');
        });
    }
}
